<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
    $permissions = [
        ['name'=>'view users'],
        ['name'=>'edit users'],
        ['name'=>'create users'],
        ['name'=>'delete users'],
        ['name'=>'view roles'],
        ['name'=>'create roles'],
        ['name'=>'edit roles'],
        ['name'=>'delete roles'],
        ['name'=>'view jobs'],
        ['name'=>'create jobs'],
        ['name'=>'edit jobs'],
        ['name'=>'delete jobs'],
        
    ];
    
    foreach ($permissions as $permission)
    {
        Permission::create($permission);
    }
    }
}