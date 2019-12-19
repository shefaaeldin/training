<?php

namespace App;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends SpatiePermission {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();

        static::deleting(function($permission) {

            if ($permission->roles) {
                $permission->roles()->detach();
            }

            dd("done");
        });
    }

}
