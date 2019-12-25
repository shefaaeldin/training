<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use App\Category;
use App\News;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $news = News::where('type', 'news')
                ->orderBy('created_at','desc')
                ->take(5)
                ->get();
        
        $articles = News::where('type', 'news')
                ->orderBy('created_at','desc')
                ->take(4)
                ->get();
        
        $categories = Category::orderBy('created_at','desc')
                ->take(4)
                ->get();
        
        return view('front/front_home',['categories'=>$categories,'news'=>$news,'articles'=>$articles]);
    }
    
    public function dashboard()
    {
        $categories = Category::all();
        return view('dashboard');
    }
    
  
}
