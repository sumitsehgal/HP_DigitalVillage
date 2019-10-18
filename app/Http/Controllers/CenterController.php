<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class CenterController extends Controller
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

        $query->where('users.role', 'center');

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
        $query->orderBy('id', 'desc');
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
        $centers = $query->paginate($size, ['*'],'page[number]', $page_num);

        return view('centers.index', compact('centers'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $center = new User();
        $partners = DB::select("SELECT distinct(partners) as partners FROM users WHERE partners IS NOT NULL");
        return view('centers.create', compact('center', 'partners'));
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
            $request['username'] = User::generateUsername($request['first_name'], 'C-');
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

        $center = User::create($request->all());
        $center->parent_id = Auth::user()->id;
        $center->role = "center";
        $password = $center->password;
        $center->password = bcrypt($center->password);
        $center->save();


        $admin = User::find($center->parent_id);

        Mail::to($center->email)->send(new UserRegistration($center, $admin, $password));

        return redirect('/centers/')->with('success', "Center added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $center = User::findOrFail($id);
        $partners = DB::select("SELECT distinct(partners) as partners FROM users WHERE partners IS NOT NULL");

        return view('centers.edit', compact('center', 'partners'));
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
        $center = User::find($id);
        $validatedData = $request->validate([
            'first_name' => 'required',
            'email' => 'required|max:255|email',
            'username' => 'required|unique:users,username,'.$id.'|max:255',
        ]);
        $center->update($request->all());
        return redirect('/centers/')->with('success', "Center record updated successfully.");

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
            return redirect('/centers/')->with('error', 'The Center has been deleted.');
        }
        return redirect('/centers/')->with('error', 'The Center can not be deleted.');
    }
}
