<?php

Route::get('/', 'Front\HomeController@index');


/**
 * Routes ADMIN
 */
Route::group(['middleware' => 'web', 'prefix' => 'admin'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');
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
    Route::get('/users', ['as' => 'users::list', 'uses' => 'Admin\UsersController@index']);
    Route::get('/users/create', ['as' => 'users::create', 'uses' => 'Admin\UsersController@create']);
    Route::get('/users/{id}/edit', ['as' => 'users::edit', 'uses' => 'Admin\UsersController@edit']);
    Route::get('/users/{id}/delete', ['as' => 'users::delete', 'uses' => 'Admin\UsersController@destroy']);
    Route::post('/users', ['as' => 'users::store', 'uses' => 'Admin\UsersController@store']);
    Route::put('/users/{id}', ['as' => 'users::update', 'uses' => 'Admin\UsersController@update']);


});
