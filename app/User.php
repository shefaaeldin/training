<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;



class User extends Authenticatable
{
    use Notifiable,HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','phone','last_name','role_id','country','gender','city'
    ];

    protected $dates = ['deleted_at'];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function role()
    {
        return $this->belongsTo('App\Role');
    }

     public function profile()
    {
        return $this->hasOne('App\Profile');
    }

     public function news()
    {
        return $this->hasMany('App\News');
    }



    protected static function boot() {
    parent::boot();



    static::deleting(function($user) {

        if($user->profile)
        {
        $user->profile->delete();
        $user->roles()->detach();
        $user->permissions()->detach();
        }

    });
}
}
