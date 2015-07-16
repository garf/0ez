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



//=======ROOT=======//
Route::group(['prefix' => 'root', 'middleware' => 'auth'], function () {

    Route::get('/', [
        'as' => 'root-index',
        'uses' => 'Root\DashboardController@index',
    ]);

});
