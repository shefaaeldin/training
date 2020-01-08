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
    
     public function newsDetails($id)
    {
        $categories = Category::all();
        $news = News::find($id);
        $relatedNews = $news->relatedNews()->take(3)->get(); 
//       dd($relatedNews);
        return view('front/details',['news'=>$news,'categories'=>$categories,'relatedNews'=>$relatedNews]);   
    }
    
     public function categoryindex($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
      
       $news = $category->news->where('type','=','news')-> sortByDesc('created_at')->take(5);
       $news =$news->chunk(3);
      
        
        
    return view('front/category',['news'=>$news,'categories'=>$categories,'category'=>$category]);   
    }
    
      public function newsIndex()
    {
       $categories = Category::all();
       $news = News::where('type', 'news')
                ->orderBy('created_at','desc')
                ->take(5)
                ->get();
       $news =$news->chunk(3);
  
    return view('front/news',['news'=>$news,'categories'=>$categories]);   
    }
    
      public function articlesIndex()
    {
       $categories = Category::all();
       $news = News::where('type', 'article')
                ->orderBy('created_at','desc')
                ->take(5)
                ->get();
       $news =$news->chunk(3);
       
      
  
    return view('front/news',['news'=>$news,'categories'=>$categories]);   
    }
    
    
    
  
}
