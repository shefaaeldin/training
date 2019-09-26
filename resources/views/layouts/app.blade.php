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
   
            @yield('content')

</html>
