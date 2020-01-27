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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/users/list', 'UsersController@index')->name('users_list');
Route::resource('users', 'UsersController');
Route::get('/roles/list', 'RolesController@index')->name('roles_list');
Route::resource('roles', 'RolesController');
Route::get('ajax/users', 'UsersController@index')->name('ajax.users.index');
Route::get('ajax/roles', 'RolesController@index')->name('ajax.roles.index');
Route::get('ajax/jobs', 'JobController@index')->name('ajax.jobs.index');
Route::get('ajax/cities', 'CityController@index')->name('ajax.city.index');
Route::get('ajax/profiles', 'ProfileController@index')->name('ajax.profile.index');
Route::get('ajax/countries', 'ProfileController@countries')->name('ajax.countries.index');
Route::get('/jobs/list', 'JobController@index')->name('jobs_list');
Route::resource('jobs', 'JobController');
Route::get('/city/list', 'CityController@index')->name('city_list');
Route::resource('city', 'CityController');
Route::get('/countries', 'HomeController@countries');
Route::get('/profiles/list', 'ProfileController@index')->name('staff_list');
Route::get('/users/changepassword/{user}', 'UsersController@changePasswordView')->name('user_changepassword_view');
Route::put('/users/changepassword/{user}', 'UsersController@changePassword')->name('user_changepassword');
Route::resource('profile', 'ProfileController');
Route::get('ajax/news', 'NewsController@index')->name('ajax.news.index');
Route::resource('news', 'NewsController');
Route::get('ajax/relatednews', 'NewsController@getRelatedNews')->name('ajax.relatednews.index');
Route::get('ajax/authors', 'NewsController@getAuthors')->name('ajax.authors.index');
Route::post('/storemedia', 'NewsController@storeMedia')->name('store.media');
Route::get('ajax/relatedimages/{id}', 'NewsController@getRelatedImages')->name('ajax.relatedimages.index');
Route::delete('ajax/deleteimage/{id}', 'NewsController@deleteimage')->name('ajax.deleteimage.index');  
Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');
Route::get('home/details/{id}', 'HomeController@newsDetails')->name('news.details');
Route::get('home/category/{id}','HomeController@categoryIndex')->name('news.front.category');  
Route::get('home/news','HomeController@newsIndex')->name('news.front.index');
Route::get('home/articles','HomeController@articlesIndex')->name('articles.front.index');
Route::get('home/search','HomeController@search')->name('news.front.search');  










    
