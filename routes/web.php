<?php


use Spatie\Permission\Models\Role;
use App\Permission;
use App\User;






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


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/users/list', 'UsersController@index')->name('users_list');
Route::resource('users', 'UsersController');
Route::get('/roles/list', 'RolesController@index')->name('roles_list');
Route::resource('roles', 'RolesController');
Route::get('ajax/users', 'Ajax\UsersDataController@index')->name('ajax.users.index');
Route::get('ajax/roles', 'Ajax\RolesDataController@index')->name('ajax.roles.index');
Route::get('ajax/jobs', 'Ajax\jobsDataController@index')->name('ajax.jobs.index');
Route::get('/jobs/list', 'jobController@index')->name('jobs_list');
Route::resource('jobs', 'JobController');





    
