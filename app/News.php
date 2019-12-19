<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
    protected $fillable = ['main_title','sub_title','content','type','writer_id','is_published'];
    
     public function author()
    {
        return $this->belongsTo('App\User');
        
    }
    
     public function relatedNews()
    {
        return $this->belongsToMany('App\News','news_relatednews','news_id','relatednews_id');
    }
    
    public function dependantNews()
    {
        return $this->belongsToMany('App\News','news_relatednews','relatednews_id','news_id');
    }
    
    public function images()
{
    return $this->hasMany('App\Image', 'news_id');
}
    
    
    
    
}
