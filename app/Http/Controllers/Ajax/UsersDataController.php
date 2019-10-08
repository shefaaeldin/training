<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use Illuminate\Http\Request;

class UsersDataController extends Controller
{
    public function index() {
    return Datatables::of(User::query())
        ->addColumn('role', function($row){
            return $row->role->name;
        })
        ->addColumn('name', function($row){
            return $row->first_name." ".$row->last_name;
        })
        ->addColumn('delete_user', function($row){
            return route("users.destroy",$row->id);
        })
         ->addColumn('edit_user', function($row){
            return route("users.edit",$row->id);
        })
        ->make(true);
    }
} 

        
