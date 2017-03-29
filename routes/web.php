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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth/roles', 'RolesController@index');
    Route::post('/auth/roles', 'RolesController@createRole');

    Route::get('/auth/users', 'UsersController@index');
    Route::get('/auth/createPost', 'PostController@index');
    Route::post('/auth/createPost', 'PostController@createPost');
//    Route::post('/auth/createGroup', 'PostController@createGroup');
    Route::post('/auth/createGroup', 'GroupsController@createGroup');
    Route::post('/auth/createGroup', 'GroupsController@createUser');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/websocket', 'WebsocketController@index');
Route::get('/logout', 'Auth\LoginController@logout');