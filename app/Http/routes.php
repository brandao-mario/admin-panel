<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    // Roles
    Route::get('/roles', ['as' => 'roles::list', 'uses' => 'RolesController@index']);
    Route::get('/roles/create', ['as' => 'roles::create', 'uses' => 'RolesController@create']);
    Route::post('/roles', ['as' => 'roles::store', 'uses' => 'RolesController@store']);
    Route::get('/roles/{id}', ['as' => 'roles::show', 'uses' => 'RolesController@show']);
    Route::get('/roles/{id}/edit', ['as' => 'roles::edit', 'uses' => 'RolesController@edit']);
    Route::put('/roles/{id}', ['as' => 'roles::update', 'uses' => 'RolesController@update']);
    Route::get('/roles/removePermission/{roleId}/{permissionId}', ['as' => 'roles::removePermission', 'uses' => 'RolesController@removePermission']);
    Route::post('/roles/addPermission/{roleId}', ['as' => 'roles::addPermission', 'uses' => 'RolesController@addPermission']);
    Route::get('/roles/{id}/delete', ['as' => 'roles::delete', 'uses' => 'RolesController@destroy']);

    // Users
});
