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
//        dd($news->images[0]);
        return view('front/details',['news'=>$news,'categories'=>$categories,'relatedNews'=>$relatedNews]);   
    }
    
     public function categoryindex($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
      
       $news = $category->news->where('type','=','news')-> sortByDesc('created_at')->take(5);
       $news =$news->chunk(3);

       
       $AllNews = News::with(['categories' => function ($query) {
        $query->where('name', 'equal','sports');
        }])->paginate(3);
      //  dd($AllNews);
      
        
        
    return view('front/category',['news'=>$news,'AllNews'=>$AllNews,'categories'=>$categories,'category'=>$category]);   
    }
    
      public function newsIndex(Request $request)
    {
      // dd($request->all());
       $categories = Category::all();
       $news = News::where('type', 'news')
                ->orderBy('created_at','desc')
                ->take(5)
                ->get();
       $news =$news->chunk(3);

       

       $AllNews = News::where('type', 'news')->paginate(5);
      //  dd($AllNews->all());
  
    return view('front/news',['news'=>$news,'AllNews'=>$AllNews,'categories'=>$categories]);   
    }
    
      public function articlesIndex()
    {
       $categories = Category::all();
       $news = News::where('type', 'article')
                ->orderBy('created_at','desc')
                ->take(5)
                ->get();
       
       
       $news =$news->chunk(3);

       $AllNews = News::where('type', 'article')->paginate(5);
       
      
  
    return view('front/news',['news'=>$news,'AllNews'=>$AllNews,'categories'=>$categories]);   
    }
    
      public function search(Request $request)
    {
          
       
       $news = News::where('main_title', 'like','%' . $request['keyword'] . '%')
                ->paginate(3);
       
//       dd($news->all());
       
       
           
  
    return view('front/search_results',['news'=>$news,'categories'=>Category::all(),'keyword'=>$request['keyword']]);   
    }
    
    
    
  
}
