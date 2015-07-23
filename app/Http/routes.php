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

    Route::get('/posts/to-category/{post_id}/{category_id}', [
        'as' => 'root-post-to-category',
        'uses' => 'Root\PostsController@toCategory',
    ])->where(['post_id' => '[0-9]+', 'category_id' => '[0-9]+']);

    //=======CATEGORIES=======//

    Route::get('/categories', [
        'as' => 'root-categories',
        'uses' => 'Root\CategoriesController@index',
    ]);

    Route::get('/categories/new', [
        'as' => 'root-categories-new',
        'uses' => 'Root\CategoriesController@newCategory',
    ]);

    Route::get('/categories/edit/{category_id}', [
        'as' => 'root-categories-edit',
        'uses' => 'Root\CategoriesController@editCategory',
    ]);

    Route::post('/categories/store/{category_id?}', [
        'as' => 'root-categories-store',
        'uses' => 'Root\CategoriesController@store',
    ]);

    Route::get('/categories/remove/{category_id}', [
        'as' => 'root-categories-remove',
        'uses' => 'Root\CategoriesController@remove',
    ]);

    //=======TAGS=======//

    Route::get('/tags', [
        'as' => 'root-tags',
        'uses' => 'Root\TagsController@index',
    ]);

    Route::get('/tags/clear-orphaned', [
        'as' => 'root-tags-clear-orphaned',
        'uses' => 'Root\TagsController@clearOrphaned',
    ]);

    Route::get('/tags/remove/{tag_id}', [
        'as' => 'root-tags-remove',
        'uses' => 'Root\TagsController@remove',
    ])->where(['tag_id' => '[0-9]+']);

    //=======SETTINGS=======//

    Route::get('/settings', [
        'as' => 'root-settings',
        'uses' => 'Root\SettingsController@index',
    ]);

    Route::get('/settings/counters', [
        'as' => 'root-counters',
        'uses' => 'Root\SettingsController@counters',
    ]);


    Route::post('/settings/counters/save', [
        'as' => 'root-counters-save',
        'uses' => 'Root\SettingsController@countersSave',
    ]);

    Route::get('/settings/robots-txt', [
        'as' => 'root-robots-txt',
        'uses' => 'Root\SettingsController@robotsTxt',
    ]);

    Route::post('/settings/robots-txt', [
        'as' => 'root-tobots-txt-save',
        'uses' => 'Root\SettingsController@robotsTxtSave',
    ]);

    Route::get('/settings/sitemap', [
        'as' => 'root-sitemap',
        'uses' => 'Root\SettingsController@sitemap',
    ]);


    //=======USERS=======//

    Route::get('/users', [
        'as' => 'root-users',
        'uses' => 'Root\UsersController@index',
    ]);

});


Route::get('/{page_name}', [
    'as' => 'static-page',
    'uses' => 'PagesController@view',
])->where(['page_name' => '[A-z0-9-_]+']);