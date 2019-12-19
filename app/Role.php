<?php

namespace App;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends SpatieRole {

    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();



        static::deleting(function($role) {

            if ($role->permissions) {
                $role->permissions()->detach();
            }

           
        });
    }

}
