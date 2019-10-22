<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //List of Centers : Only Accessible to Admin
        $resource = new User();
        $query= $resource->distinct()->select("users.*");

        $query->where('users.role', 'student');
        $user = Auth::user();
        if($user->isCenter())
        {
            $query->where('parent_id', $user->id);
        }

        //Basic Filter
        if (isset($request->filter) && !empty($request->filter))
        {
            foreach ($request->filter as $key => $value)
            {
                $filter_values = explode(',',$value);
                if (strpos($key,'.') === false)
                    $key= $resource->getTableName().".".$key;
                $query = $query->wherein($key,$filter_values);
            }
        }
        $query->orderBy('created_at', 'desc');
        // Basic Sorting
        if (isset($request->sort) && !empty($request->sort))
	    {
		    foreach (explode(",", $request->sort) as $sort)
		    {
			    $direction = "asc";
			    $count = 0;
			    $sort = str_replace("-", "", $sort, $count);
			    if($count > 0 )
			    {
				    $direction = "desc";
			    }
			    $query->orderBy($sort, $direction);
		    }
	    }

        $page_parms = (isset($request->page) && !empty($request->page)) ? $request->page : null;
        $size = $page_num = null;
        $size = 10;
        if ($page_parms)
        {
            $size = array_key_exists('size',$page_parms) ? $page_parms['size'] : null;
            $page_num = array_key_exists('number',$page_parms) ? $page_parms['number'] : null;
            $size = ($size == -1) ? $query->count() : $size;
        }
        $students = $query->paginate($size, ['*'],'page[number]', $page_num);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new User();
        $centers = User::where('role', 'center')->get();
        return view('students.create', compact('student', 'centers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationRules = [
            'first_name' => 'required',
            'email' => 'required|max:255|email',
        ];
        /** Dynamic Validation */
        if(empty($request['username']))
        {
            $request['username'] = User::generateUsername($request['first_name'], 'S-');
        }
        else
        {
            $validationRules['username'] = 'required|unique:users|max:255';
        }


        if(empty($request["password"]))
        {
            $request['password'] = uniqid();
        }
        else
        {
            $validationRules['password'] = 'required|confirmed';
        }

        $validatedData = $request->validate($validationRules);

        $file = $request->avatarfile;
        if(!empty($file))
        {
            $request["avatar"] = $file->store('public');
            unset($request["avatarfile"]);
        }
        

        $student = User::create($request->all());
        if(empty($student->parent_id))
            $student->parent_id = Auth::user()->id;
        $student->role = "student";
        $password = $student->password;
        $student->password = bcrypt($student->password);
        $student->save();

        $center = User::find($student->parent_id);

        Mail::to($student->email)->send(new UserRegistration($student, $center, $password));
        return redirect('/students/')->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::findOrFail($id);
        $centers = User::where('role', 'center')->get();

        return view('students.edit', compact('student', 'centers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = User::find($id);
        $validatedData = $request->validate([
            'first_name' => 'required',
            'email' => 'required|max:255|email',
            'username' => 'required|unique:users,username,'.$id.'|max:255',
        ]);

        $file = $request->avatarfile;
        if(!empty($file))
        {
            $request["avatar"] = $file->store('public');
            unset($request["avatarfile"]);
        }

        $student->update($request->all());
        return redirect('/students/')->with('success', "Student record updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedUser = User::findOrFail($id);
        $user = Auth::user();
        if($user->isAdmin() || ( $user->isCenter() && $user->id == $deletedUser->parent_id ))
        {
            $deletedUser->delete();
            return redirect('/students/')->with('error', 'The Student has been deleted.');
        }
        return redirect('/students/')->with('warning', 'The Student can not be deleted!');        
    }
}
