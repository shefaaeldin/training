<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    
    
    
    protected function validateEmail(Request $request)
    {
        $loginInput = request()->input('email');
       
        if(filter_var($loginInput, FILTER_VALIDATE_EMAIL))
        {
             
          $request->validate(['email' => 'required|email']);
        }
        
        else
        {
            
           $user = User::where('phone',$loginInput)->first();
           
           if($user == NULL)
           {
              return redirect()->back();
           }
           else
           {
           request()->merge(['email'=>$user->email]);
            $request->validate(['email' => 'required|email']);
           //dd(request()->all());
           }
           
        }
       
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
