<?php

namespace App\Http\Controllers;

use App\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\User;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }
    
    
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
        $actions = ['view','create','edit','delete'];
        $names = ['users','roles','jobs','cities'];
        
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
       
       // $role->permissions()->detach();
        $allPermissions = Permission::all();
        $role->revokePermissionTo($allPermissions);
        
        if ($request->has('actions'))
        {
        foreach($request->actions as $action)
        {
            $role->givePermissionTo($action);
            
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
        $role->delete();
        return redirect('/roles/list')->with(['success'=>'The role has been deleted updated']);
    }
}
