<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct()
    {
        $this->authorizeResource(User::class,'user');
    } 
    
    
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
    
    
      public function changePasswordView(User $user)
    {
         return view('change_password',['user'=>$user]); 
    }
    
      public function changePassword(User $user , Request $request)
    {
         
          $request->validate([
            'password' => 'required|string|min:8|alpha_num|confirmed|regex:/[a-zA-Z]/|regex:/\d/',
        ]);
          
         if($user->is_password_changed==0) 
         {
             $user->update(['password' => Hash::make($request['password'])]);
             $user->is_password_changed= 1;
             $user->save();
             return redirect('/login')->with(['success'=>'Your password has been successfully changed']);
             
         }
         else
         {
             return redirect('/login')->with(['warning'=>'Your password has been already changed before']);
         }
        
        
    }
    
    
}
