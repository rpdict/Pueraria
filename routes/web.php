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
    Route::get('/auth/groups', 'GroupsController@index');
    Route::get('/auth/users', 'UsersController@index');
    Route::get('/auth/createPost', 'PostController@index');
    Route::post('/auth/createPost', 'PostController@createPost');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/websocket', 'WebsocketController@index');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
