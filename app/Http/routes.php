<?php

Route::get('/', [
    'as' => 'index',
    'uses' => 'PostsController@index',
]);

Route::get('/view/{slug}', [
    'as' => 'view',
    'uses' => 'PostsController@view',
]);

Route::get('/tag/{tag}', [
    'as' => 'tag',
    'uses' => 'PostsController@tag',
]);

Route::get('/category/{slug?}', [
    'as' => 'category',
    'uses' => 'PostsController@index',
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
        'uses' => 'Root\PostsController@index',
    ]);

    Route::get('/posts/new', [
        'as' => 'root-posts-new',
        'uses' => 'Root\PostsController@newPost',
    ]);

    Route::get('/posts/edit/{post_id}', [
        'as' => 'root-post-edit',
        'uses' => 'Root\PostsController@edit',
    ])->where(['post_id' => '[0-9]+']);

    Route::post('/posts/store/{post_id?}', [
        'as' => 'root-posts-store',
        'uses' => 'Root\PostsController@store',
    ])->where(['post_id' => '[0-9]+']);

    Route::get('/posts/pin/{post_id}', [
        'as' => 'root-post-pin',
        'uses' => 'Root\PostsController@pin',
    ])->where(['post_id' => '[0-9]+']);

    Route::get('/posts/unpin/{post_id}', [
        'as' => 'root-post-unpin',
        'uses' => 'Root\PostsController@unpin',
    ])->where(['post_id' => '[0-9]+']);

    Route::get('/posts/to-draft/{post_id}', [
        'as' => 'root-post-to-draft',
        'uses' => 'Root\PostsController@toDraft',
    ])->where(['post_id' => '[0-9]+']);

    Route::get('/posts/to-active/{post_id}', [
        'as' => 'root-post-to-active',
        'uses' => 'Root\PostsController@toActive',
    ])->where(['post_id' => '[0-9]+']);

    Route::get('/posts/to-deleted/{post_id}', [
        'as' => 'root-post-to-deleted',
        'uses' => 'Root\PostsController@toDeleted',
    ])->where(['post_id' => '[0-9]+']);

    //=======CATEGORIES=======//

    Route::get('/categories', [
        'as' => 'root-categories',
        'uses' => 'Root\CategoriesController@index',
    ]);

    //=======USERS=======//

    Route::get('/users', [
        'as' => 'root-users',
        'uses' => 'Root\UsersController@index',
    ]);

});
