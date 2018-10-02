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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/superadmin', 'SuperAdminController@index');
Route::POST('/admin/assignRole', 'SuperAdminController@assignRole')->name('asignRole');
Route::get('admin/home', 'AdminController@index');
Route::get('author/home', 'AuthorController@index');
Route::get('user/home', 'UserController@index');
Route::get('/editProfile', 'UserController@editProfile');
//Route::post('/saveEditProfile', 'UserController@saveEditProfile');
Route::get('content/content', 'AuthorController@Content');
Route::get('content/add-content', 'AuthorController@addContent');
Route::get('editContent/{id}', 'AuthorController@editContent')->name('editContent');
Route::post('content/storeContent', 'AuthorController@storeContent');