<?php

Route::get('/', [
    'as' => 'index',
    'uses' => 'BlogController@index',
]);
