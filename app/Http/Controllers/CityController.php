<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class CityController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('city_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $countries = Countries::all();
        return view('city_create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:150|min:2',
            'country' => 'required|string|max:250|min:2',
        ]);

        City::create(['name' => $request['name'], 'country' => $request['country']]);
        return redirect('/city/list')->with(['success' => 'The city has been successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city) {
        $countries = Countries::all();
        return view('city_edit', ['city' => $city, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city) {
        $request->validate([
            'name' => 'required|string|max:150|min:2',
            'country' => 'required|string|max:250|min:2',
        ]);

        $city->update(['name' => $request['name'], 'country' => $request['country']]);
        return redirect('/city/list')->with(['success' => 'The city has been successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city) {
        $city->delete();
        return redirect('/city/list')->with(['success' => 'The city has been successfully deleted']);
    }

}
