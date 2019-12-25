<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Category extends Model
{
     protected $fillable = ['name'];
    
  
    
     public function news()
    {
        return $this->belongsToMany('App\News','category_news','category_id','news_id');
    }
}
