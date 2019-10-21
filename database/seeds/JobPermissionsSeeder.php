<?php

use Illuminate\Database\Seeder;
use App\Permission;

class JobPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
    $permissions = [
      
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
