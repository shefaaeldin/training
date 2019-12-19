<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'user_id', 'country', 'city','gender','photo'];
    
     public function user()
    {
        return $this->belongsTo('App\User');
    }
    
      protected static function boot() {
    parent::boot();
    
    

    
}
}
