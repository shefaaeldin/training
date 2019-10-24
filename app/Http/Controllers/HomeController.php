<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function countries()

    {

        $countries = Countries::all();
        dd($countries['EGY']);

        return view('countries',compact('countries'));

    }
}
