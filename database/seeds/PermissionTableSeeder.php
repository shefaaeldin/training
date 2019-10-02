<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}



    public function run()
    {
       $permission_ids = []; // an empty array of stored permission IDs
// iterate though all routes
foreach (Route::getRoutes()->getRoutes() as  $route)
{
 // get route action
 $action = $route->getActionname();
// separating controller and method
 $_action = explode('@',$action);
 
 $controller = $_action[0];
 $method = end($_action);
 
 // check if this permission already exists
 $permission_check = Permission::where(
         ['controller'=>$controller,'method'=>$method]
     )->first();
 if(!$permission_check){
   $permission = new Permission;
   $permission->controller = $controller;
   $permission->method = $method;
   $permission->save();
   // add stored permission id in array
   $permission_ids[] = $permission->id;
 }
}

//naming permissionsfor

foreach ($permission_ids as $permission_id)
{
    $permissionById =  Permission::find($permission_id);
    if(in_array($permissionById->method, ['index','show']))
    {
     
        $permissionById->name = strtolower($this->get_string_between($permissionById->controller, 'Controllers\\', 'sController'))."s_list";
        $permissionById->save();       
        }elseif(in_array($permissionById->method, ['create','store']))
        {
     
        $permissionById->name = strtolower($this->get_string_between($permissionById->controller, 'Controllers\\', 'sController'))."s_create";
        $permissionById->save();       
        }elseif(in_array($permissionById->method, ['edit','update']))
        {
     
        $permissionById->name = strtolower($this->get_string_between($permissionById->controller, 'Controllers\\', 'sController'))."s_edit";
        $permissionById->save();       
        }elseif(in_array($permissionById->method, ['destroy']))
        {
     
        $permissionById->name = strtolower($this->get_string_between($permissionById->controller, 'Controllers\\', 'sController'))."s_delete";
        $permissionById->save();       
        }         
     
}

// find admin role.
$admin_role = Role::where('name','admin')->first();
// atache all permissions to admin role
$admin_role->permissions()->attach($permission_ids);
    }
}
