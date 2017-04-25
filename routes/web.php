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
    Route::get('auth/roles', 'RolesController@index');
    Route::post('auth/roles', 'RolesController@createRole');
    Route::post('auth/roles/edit/{id}', 'RolesController@editRole');
    Route::post('auth/roles/removeRole/{id}', 'RolesController@removeRole');
    Route::post('auth/roles/rolePermissions/{id}', 'RolesController@rolePermissions');

    Route::get('auth/permissions', 'PermissionsController@index');
    Route::post('auth/permissions', 'PermissionsController@createPermission');
    Route::post('auth/permissions/edit/{id}', 'PermissionsController@editPermission');
    Route::post('auth/permissions/removePermission/{id}', 'PermissionsController@removePermission');


    Route::get('auth/users', 'UsersController@index');
    Route::get('auth/createPost', 'PostController@index');
    Route::post('auth/createPost', 'PostController@createPost');

    Route::get('auth/contacts', 'ContactsController@index');
    Route::post('auth/contacts', 'ContactsController@createContact');

//    Route::post('/auth/createGroup', 'PostController@createGroup');
    Route::post('/auth/createGroup', 'GroupsController@createGroup');
    Route::post('/auth/createGroup', 'GroupsController@createUser');

    Route::get('auth/upload', 'UploadController@index');
    Route::post('auth/upload', 'UploadController@upload');
    Route::post('auth/upload/edit/{id}', 'UploadController@update');
    Route::post('auth/upload/removeUpload/{id}', 'UploadController@destroy');
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/websocket', 'WebsocketController@index');
Route::get('/QRlogin/{key}', 'QRLoginController@index');
Route::post('/QRlogin/{key}', 'QRLoginController@attemptLogin');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/login/{id}', 'QRLoginController@login');

//Route::get('/666', function (){
//    return view('functions.partials.success');
//});


//Route::get('redis', function (){
//    Redis::publish('test-channel', json_encode(['foo' => 'bar']));
//});
//Route::get('redis', 'WebsocketController@redis');

Route::get('/vue', function (){
    return view('functions.vue');
});