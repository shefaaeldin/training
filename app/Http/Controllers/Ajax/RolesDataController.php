<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Role;
use Illuminate\Http\Request;

class RolesDataController extends Controller
{
    public function index() {
    return Datatables::of(Role::query())
        ->addColumn('delete_role', function($row){
            return route("roles.destroy",$row->id);
        })
         ->addColumn('edit_role', function($row){
            return route("roles.edit",$row->id);
        })
        ->make(true);
    }
} 

        
