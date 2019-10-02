<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = Role::all();
        return view('roles_list',compact('roles',$roles)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $roles = Role::all()->toArray();
        $actions = ['list','create','edit','delete'];
        $names = ['users','roles'];
        
        return view('roles_edit',['names'=>$names ,'actions'=>$actions ,'role'=>$role]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->permissions()->detach();
        
        if ($request->has('actions'))
        {
        foreach($request->actions as $action)
        {
          
            $permissions = Permission::where('name','=',$action)->get();
            foreach($permissions as $permission)
            {
                if(!$role->permissions->contains('name',$permission->name)){
                $role->permissions()->attach($permission);
                $role->save();
                }
                
               
            }
            
            
        }
        }
        
         return redirect('/roles/list')->with(['success'=>'The role has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
