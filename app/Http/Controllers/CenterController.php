<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        return view('centers.create', compact('center'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required',
            'email' => 'required|unique:users|max:255|email',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);

        $center = User::create($request->all());
        $center->parent_id = Auth::user()->id;
        $center->role = "center";
        $center->password = bcrypt($center->password);
        $center->save();
        return redirect('/centers/');
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

        return view('centers.edit', compact('center'));
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
            'email' => 'required|unique:users,email,'.$id.'|max:255|email',
            'username' => 'required|unique:users,username,'.$id.'|max:255',
        ]);
        $center->update($request->all());
        return redirect('/centers/');

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
            return Redirect::back()->withErrors(['msg', 'The Center has been deleted.']);
        }
        return Redirect::back()->withErrors(['msg', 'The Center can not be deleted.']);        
    }
}
