@extends('layouts.app')


@section('head')
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection


@section('content')
<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                  @csrf
                <div class="form-group">
                    
                    <input id="username" type="text" class="form-control{{ $errors->has('email') || $errors->has('phone')  ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                
                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    
                     @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                  @if (Session::get('trycount')>=3)
                  <div class="g-recaptcha" data-sitekey="6LdlF7gUAAAAALM57eVZOdOsYd02h8rkZfoWG4LY"></div>
                   @endif
                   
                  @if (session('recaptcha'))
                 <span class="invalid-feedback" role='alert'>
                  <strong>{{ session('recaptcha') }}</strong>
                  </span>
                @endif
                  

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="\password\reset"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{route('register')}}">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
        
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
@endsection
