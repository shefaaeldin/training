<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Job;
use Illuminate\Http\Request;

class JobsDataController extends Controller
{
    public function index() {
    return Datatables::of(Job::query())
            ->addColumn('delete_job', function($row){
            return route("jobs.destroy",$row->id);
        })
         ->addColumn('edit_job', function($row){
            return route("jobs.edit",$row->id);
        })
        ->make(true);
    }
} 

        
