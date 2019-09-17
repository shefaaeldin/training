<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> INSPINIA | Register </title>
    
     <link href="{{asset('styles/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('styles/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('styles/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('styles/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('styles/css/style.css')}}" rel="stylesheet">
    
   
@yield('head')
    
</head>
<body class="gray-bg">
    <nav class="white-bg navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel</a>
        
        @guest
        
                    <a class="nav-link" href="\login">Login</a>  
                    <a class="nav-link" href="\register">Register</a>
                
            @endguest
        
        @auth
        

                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                
        
        @endauth
        
       
         </div>
        
    </div>
</nav>
    
    <div id="app">
       

       
            @yield('content')
        
    </div>
</body>
</html>
