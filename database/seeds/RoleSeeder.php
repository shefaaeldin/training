<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        
        // retrieving all permissions
    $permissions = Permission::all();
    
    // creating role admin and graunting him permissions
    $role = role::create(['name'=>'admin']);
    $role->givePermissionTo($permissions);
    
    // creating user role
    role::create(['name'=>'user']);
    
    // create admin user 
    
    $user = User::create([
            'first_name' => 'Shefaa',
            'last_name' => 'Admin',
            'email' => 'shefaa@admin.com',
            'phone' => '01221103650',
            'password' => Hash::make('test1234'),
            
        ]);
    
    $user->assignRole('admin');
    
    }
}
