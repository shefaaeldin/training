<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/list', 'UsersController@index')->name('users_list');
Route::resource('users', 'UsersController');
Route::get('/roles/list', 'RolesController@index')->name('roles_list');
Route::resource('roles', 'RolesController');

