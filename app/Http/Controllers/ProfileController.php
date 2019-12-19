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
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChangePasswordEmail;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //dd(asset('storage/avatars/dQzYBt9HEekY4b1m6uQt6aZlim4k55mSHrGXzmh4.png'));
        
           if ($request->ajax()) {
            
            Return $this->getProfileData();
        }

        return view('staff_list');
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
            'profile_image'=>'mimes:png,JPG|image|max:2000',
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
        
        if($request['profile_image'])
        {
        $image_path =  $request['profile_image']->store('avatars');
        $profile->photo = $image_path;
        $profile->save();
        }
       
        
        Mail::to($user->email)->send(new ChangePasswordEmail($profile)); 
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
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
 
            $profile->user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);
            
              $profile->update([
            'country' => $request['country'],
            'city' => $request['city'],
            'gender' => $request['gender'],
           
        ]);
            
            if($request['profile_image']=!NULL)
            {
            $image_path =  $request['profile_image']->store('avatars');
            $profile->photo = $image_path;
            $profile->save();
            }
      
            
            return redirect('/profiles/list')->with(['success'=>'The Staff member profile has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->user->delete();
        return redirect('/profiles/list')->with(['success'=>'The Staff member profile has been successfully deleted']);
    }
    
      public function countries(Request $request) {

    $cities = City::where('country','=',$request['country'])->get();
    
        return $cities;
    }
    
    public function getProfileData(){

        return Datatables::of(Profile::query())
                        ->addColumn('name', function($row) {
                            return $row->user->first_name . " " . $row->user->last_name;
                        })
                        ->addColumn('delete_profile', function($row) {
                            return route("profile.destroy", $row->id);
                        })
                        ->addColumn('edit_profile', function($row) {
                            return route("profile.edit", $row->id);
                        })
                        ->make(true);
    }
    
   
}
