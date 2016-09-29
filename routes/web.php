<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


//create a group for middleware
Route::group(['middleware'=>'admin'],function() {

});
Route::get('/userdelete/{id}','AdminUsersController@destroy');
Route::get('/postdelete/{id}','PostsController@destroy');
Route::get('/catdelete/{id}','categoriesController@destroy');
Route::resource('admin/posts','PostsController');
Route::resource('admin/images','ImageController');
Route::resource('admin/users','AdminUsersController');
Route::resource('admin/categories','categoriesController');
Route::resource('admin','AdminController');
