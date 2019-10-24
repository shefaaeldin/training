<?php

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\City;
use Illuminate\Http\Request;

class CityDataController extends Controller
{
    public function index() {
    return Datatables::of(city::query())
            ->addColumn('delete_city', function($row){
            return route("city.destroy",$row->id);
        })
         ->addColumn('edit_city', function($row){
            return route("city.edit",$row->id);
        })
        ->make(true);
    }
} 

        
