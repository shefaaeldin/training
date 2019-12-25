<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use \Yajra\DataTables\Facades\DataTables;
use App\User;
use App\Http\Requests\StoreNews;
use App\Image;
use App\Category;

class NewsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->ajax()) {

            Return $this->getNewsData();
        }

        return view('news_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        return view('news_create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNews $request) {


//       if($request['file'])
//        {
//        $image_path =  $request['file']->store('avatars');
//        }
//        
//        return $image_path;



        $news = News::create($request->except('media', 'category'));
        $images = explode(',', $request['media']);
        foreach ($images as $img) {
            Image::create(['path' => $img, 'news_id' => $news->id]);
        }
//        dd($request->all());
        $categories = $request['category'];
        foreach ($categories as $cat) {
            $news->categories()->attach($cat);
        }

        $related_news = $request['related_news'];

        if ($related_news) {
            foreach ($related_news as $rel) {
                $news->relatedNews()->attach($rel);
            }
        }
        return redirect('/news')->with(['success' => 'The news has been successfully added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news) {
        return view('news_edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news) {
        $news->update($request->except('media'));
        $images = explode(',', $request['media']);
        foreach ($images as $img) {
            Image::create(['path' => $img, 'news_id' => $news->id]);
        }
        return redirect('/news')->with(['success' => 'The news has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news) {
        $news->delete();
        return redirect('/news')->with(['success' => 'The news has been successfully deleted']);
    }

    public function getNewsData() {

        return Datatables::of(news::query())
                        ->addColumn('delete_news', function($row) {
                            return route("news.destroy", $row->id);
                        })
                        ->addColumn('edit_news', function($row) {
                            return route("news.edit", $row->id);
                        })
                        ->make(true);
    }

    public function getRelatedNews(Request $request) {



        $relatedNews = News::where('type', '=', $request['type'])->get();

        return $relatedNews;
    }

    public function getAuthors(Request $request) {


        if ($request['type'] == 'news') {

            $authors = User::whereHas('roles', function ($query) {
                        $query->where('name', '=', 'writer');
                    })->get();
        } else {
            $authors = User::whereHas('roles', function ($query) {
                        $query->where('name', '=', 'reporter');
                    })->get();
        }


        return $authors;
    }

    public function storeMedia(Request $request) {

        if ($request['file']) {
            $image_path = $request['file']->store('images');
            return $image_path;
        } else if ($request['upload']) {
            $image_path = $request['upload']->store('images');
//        return collect(['url' => asset('storage/' . $image_path)]);
            return response()->json(["url" => asset('storage/' . $image_path)]);
        }




//       dd($request->all());
//        $news = News::create($request->all());
//       return redirect('/news')->with(['success'=>'The news has been successfully added']); 
    }

    public function getRelatedImages(Request $request, $id) {
        return News::find($id)->images;


//       dd($request->all());
//        $news = News::create($request->all());
//       return redirect('/news')->with(['success'=>'The news has been successfully added']); 
    }

    public function deleteimage(Request $request, $id) {
        $image = Image::find($id);
        $image->delete();



//       dd($request->all());
//        $news = News::create($request->all());
//       return redirect('/news')->with(['success'=>'The news has been successfully added']); 
    }

}
