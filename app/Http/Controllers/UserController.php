<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changepassword()
    {
        return view('users.changepassword');
    }

    public function storepassword(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'password' => 'required|confirmed'
        ]);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/home');
    }

    public function otherpassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('users.otherpassword', compact('user'));
    }

    public function storeotherpassword(Request $request, $id)
    {
        $authUser = Auth::user();
        $user = User::findOrFail($id);
        if($user->parent_id == $authUser->id || $authUser->isAdmin())
        {
            $validatedData = $request->validate([
                'password' => 'required|confirmed'
            ]);
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/home');
        }

    }

}
