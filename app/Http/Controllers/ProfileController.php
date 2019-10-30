<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use App\City;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //dd(asset('storage/avatars/dQzYBt9HEekY4b1m6uQt6aZlim4k55mSHrGXzmh4.png'));
        $profiles = Profile::all();
        return view('staff_list',compact('profiles',$profiles)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $countries = Countries::all();
         $cities = City::all();
        return view('profile_create', ['countries' => $countries,'cities'=>$cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $userData = $request->validate([
            'first_name' => 'required|string|max:150|min:2',
            'last_name' => 'required|string|max:150|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|unique:users|min:11|regex:/^\d+$/',
            'password' => 'required|string|min:8|alpha_num|confirmed|regex:/[a-zA-Z]/|regex:/\d/',
        ]);
        
       
        $profileData =$request->validate([
            'country' => 'required|string|max:150|min:2',
            'city' => 'required|string|max:150|min:2',
            'gender' => 'required',
            'profile_image'=>'mimes:jpg,png|image|max:2000',
        ]);
        
        $user= User::create([
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'password' => Hash::make($userData['password']),
            
        ]);
        
        $user->assignRole('user');
        
        $profileData['user_id']=$user->id;
        $profile = Profile::create($profileData);
        $image_path =  $request['profile_image']->store('avatars');
       // $file = $request->file('profile_image');
       // Storage::put('name',$file);
       // dd(asset($image_path));
        $profile->photo = $image_path;
        $profile->save();
        dd($profile->photo);
        //dd(asset('storage/'.$image_path));
        return redirect('/profiles/list')->with(['success'=>'The Staff member has been successfully created']); 
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        
       
        $roles = Role::all();
        $countries = Countries::all();
        $cities = City::all();
        
        return view('profiles_edit',['roles'=>$roles,'profile'=>$profile,'countries'=>$countries,'cities'=>$cities]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
