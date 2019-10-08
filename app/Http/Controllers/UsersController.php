<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users_list',compact('users',$users));  
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        
        return view('users_edit',['roles'=>$roles,'user'=>$user]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:150|min:2',
            'last_name' => 'required|string|max:150|min:2',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|min:11|regex:/^\d+$/|unique:users,phone,'.$user->id,
            
        ]);
        
        $user->update(['first_name'=>$request['first_name'],'last_name'=>$request['last_name'],'email'=>$request['email'],'phone'=>$request['phone']]);
        return redirect('/users/list')->with(['success'=>'User\'s profile has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users/list')->with(['success'=>'User\'s profile has been successfully deleted']);
    }
    
    
}
