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
