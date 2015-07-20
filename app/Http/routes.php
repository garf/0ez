<?php

Route::get('/', [
    'as' => 'index',
    'uses' => 'BlogController@index',
]);

Route::get('/view/{slug}', [
    'as' => 'view',
    'uses' => 'BlogController@view',
]);

Route::get('/category/{slug?}', [
    'as' => 'category',
    'uses' => 'BlogController@index',
]);

//=======AUTH=======//
Route::get('/root/login', [
    'as' => 'login',
    'uses' => 'AuthController@login',
]);

Route::post('/root/login', [
    'uses' => 'AuthController@loginPost',
]);

Route::get('/root/logout', [
    'as' => 'logout',
    'uses' => 'AuthController@logout',
]);


//=======ROOT=======//
Route::group(['prefix' => 'root', 'middleware' => 'auth'], function () {

    Route::get('/', [
        'as' => 'root-index',
        'uses' => 'Root\DashboardController@index',
    ]);

    Route::get('/posts', [
        'as' => 'root-posts',
        'uses' => 'Root\BlogController@index',
    ]);

    Route::get('/posts/new', [
        'as' => 'root-posts-new',
        'uses' => 'Root\BlogController@addPost',
    ]);

});
