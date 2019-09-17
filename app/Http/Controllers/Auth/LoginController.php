<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Zttp\Zttp;
use Illuminate\Validation\ValidationException;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    
  

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
    
    
    
     public function showLoginForm()
    {
        
        return view('auth.login');
    }
    
    
    
    public function username()
    {
        $loginInput = request()->input('username');
       
        $loginType = 'email';
  
        if(filter_var($loginInput, FILTER_VALIDATE_EMAIL))
        {
        
           request()->merge(['email'=>$loginInput]);
            
            //dd(request()->all());
            return 'email';
        }
        
        else
        {
           request()->merge(['phone'=>$loginInput]);
           //dd(request());
            return 'phone';
        }
        
    }
    
    
    protected function sendFailedLoginResponse(Request $request)
    {
           if(Session::get('trycount'))
            {
           Session::put('trycount', Session::get('trycount')+1);
            }
            else{
                Session::put('trycount',1);
            }
            
            
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
        
        
    }
    
     protected function sendLoginResponse(Request $request)
    {
       
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }
    
    
    public function login(Request $request)
    {
        
       
        $this->validateLogin($request);
        
        
        if(Session::get('trycount')>=3)
        {
        $response = Zttp::asFormparams()->post("https://www.google.com/recaptcha/api/siteverify", [
        'secret' => config('services.recaptcha.secret'),
        'response' => $request->input('g-recaptcha-response'),
        'remoteip'=> $_SERVER["REMOTE_ADDR"]
         ]);
        
        if(! $response->json()['success'])
        {
            
         return redirect('\login')->with('recaptcha','The reCaptcha is required');
            
        }
        }
       
        
            

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        $key= $this->throttleKey($request);
        //dump($key);
        $this->loginAttempts = $this->limiter()->attempts($key);
       
        
        

        return $this->sendFailedLoginResponse($request, ['attempts'=>$this->loginAttempts]);
    }
}
