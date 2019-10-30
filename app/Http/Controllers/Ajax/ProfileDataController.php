<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Profile;
use Illuminate\Http\Request;
use App\City;

class ProfileDataController extends Controller {

    public function index() {


        return Datatables::of(Profile::query())
                        ->addColumn('name', function($row) {
                            return $row->user->first_name . " " . $row->user->last_name;
                        })
                        ->addColumn('delete_profile', function($row) {
                            return route("profile.destroy", $row->id);
                        })
                        ->addColumn('edit_profile', function($row) {
                            return route("profile.edit", $row->id);
                        })
                        ->make(true);
    }
    
    public function countries(Request $request) {

    $cities = City::where('country','=',$request['country'])->get();
    
        return $cities;
    }

}
