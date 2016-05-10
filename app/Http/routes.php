<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [
        'as'   => 'index',
        'uses' => 'PostsController@index',
    ]);

    Route::get('/view/{slug}', [
        'as'   => 'view',
        'uses' => 'PostsController@view',
    ]);

    Route::get('/tag/{tag}', [
        'as'   => 'tag',
        'uses' => 'PostsController@tag',
    ]);

    Route::get('/category/{slug?}', [
        'as'   => 'category',
        'uses' => 'PostsController@index',
    ]);

//=======AUTH=======//
    Route::get('/root/login', [
        'as'   => 'login',
        'uses' => 'AuthController@login',
    ]);

    Route::post('/root/login', [
        'uses' => 'AuthController@loginPost',
    ]);

    Route::get('/root/logout', [
        'as'   => 'logout',
        'uses' => 'AuthController@logout',
    ]);

//=======ROOT=======//
    Route::group(['prefix' => 'root', 'middleware' => 'auth'], function () {

        Route::get('/', [
            'as'   => 'root-index',
            'uses' => 'Root\DashboardController@index',
        ]);

        Route::get('/posts', [
            'as'   => 'root-posts',
            'uses' => 'Root\PostsController@index',
        ]);

        Route::get('/posts/new', [
            'as'   => 'root-posts-new',
            'uses' => 'Root\PostsController@newPost',
        ]);

        Route::get('/posts/edit/{post_id}', [
            'as'             => 'root-post-edit',
            'uses'           => 'Root\PostsController@edit',
        ])->where(['post_id' => '[0-9]+']);

        Route::post('/posts/store/{post_id?}', [
            'as'             => 'root-posts-store',
            'uses'           => 'Root\PostsController@store',
        ])->where(['post_id' => '[0-9]+']);

        Route::get('/posts/pin/{post_id}', [
            'as'             => 'root-post-pin',
            'uses'           => 'Root\PostsController@pin',
        ])->where(['post_id' => '[0-9]+']);

        Route::get('/posts/unpin/{post_id}', [
            'as'             => 'root-post-unpin',
            'uses'           => 'Root\PostsController@unpin',
        ])->where(['post_id' => '[0-9]+']);

        Route::get('/posts/to-draft/{post_id}', [
            'as'             => 'root-post-to-draft',
            'uses'           => 'Root\PostsController@toDraft',
        ])->where(['post_id' => '[0-9]+']);

        Route::get('/posts/to-active/{post_id}', [
            'as'             => 'root-post-to-active',
            'uses'           => 'Root\PostsController@toActive',
        ])->where(['post_id' => '[0-9]+']);

        Route::get('/posts/to-deleted/{post_id}', [
            'as'             => 'root-post-to-deleted',
            'uses'           => 'Root\PostsController@toDeleted',
        ])->where(['post_id' => '[0-9]+']);

        Route::get('/posts/to-category/{post_id}/{category_id}', [
            'as'             => 'root-post-to-category',
            'uses'           => 'Root\PostsController@toCategory',
        ])->where(['post_id' => '[0-9]+', 'category_id' => '[0-9]+']);

        //=======CATEGORIES=======//

        Route::get('/categories', [
            'as'   => 'root-categories',
            'uses' => 'Root\CategoriesController@index',
        ]);

        Route::get('/categories/new', [
            'as'   => 'root-categories-new',
            'uses' => 'Root\CategoriesController@newCategory',
        ]);

        Route::get('/categories/edit/{category_id}', [
            'as'   => 'root-categories-edit',
            'uses' => 'Root\CategoriesController@editCategory',
        ]);

        Route::post('/categories/store/{category_id?}', [
            'as'   => 'root-categories-store',
            'uses' => 'Root\CategoriesController@store',
        ]);

        Route::get('/categories/remove/{category_id}', [
            'as'   => 'root-categories-remove',
            'uses' => 'Root\CategoriesController@remove',
        ]);

        //=======TAGS=======//

        Route::get('/tags', [
            'as'   => 'root-tags',
            'uses' => 'Root\TagsController@index',
        ]);

        Route::get('/tags/clear-orphaned', [
            'as'   => 'root-tags-clear-orphaned',
            'uses' => 'Root\TagsController@clearOrphaned',
        ]);

        Route::get('/tags/remove/{tag_id}', [
            'as'            => 'root-tags-remove',
            'uses'          => 'Root\TagsController@remove',
        ])->where(['tag_id' => '[0-9]+']);

        //=======SETTINGS=======//

        Route::get('/settings', [
            'as'   => 'root-settings',
            'uses' => 'Root\SettingsController@index',
        ]);

        Route::get('/settings/counters', [
            'as'   => 'root-settings-counters',
            'uses' => 'Root\SettingsController@counters',
        ]);

        Route::post('/settings/counters/save', [
            'as'   => 'root-settings-counters-save',
            'uses' => 'Root\SettingsController@countersSave',
        ]);

        Route::get('/settings/robots-txt', [
            'as'   => 'root-settings-robots-txt',
            'uses' => 'Root\SettingsController@robotsTxt',
        ]);

        Route::post('/settings/robots-txt', [
            'as'   => 'root-settings-robots-txt-save',
            'uses' => 'Root\SettingsController@robotsTxtSave',
        ]);

        Route::get('/settings/sitemap', [
            'as'   => 'root-settings-sitemap',
            'uses' => 'Root\SettingsController@sitemap',
        ]);

        Route::post('/settings/sitemap', [
            'as'   => 'root-settings-sitemap-save',
            'uses' => 'Root\SettingsController@sitemapSave',
        ]);

        Route::get('/settings/sitemap/generate', [
            'as'   => 'root-settings-sitemap-generate',
            'uses' => 'Root\SettingsController@sitemapGenerate',
        ]);

        Route::get('/settings/website', [
            'as'   => 'root-settings-website',
            'uses' => 'Root\SettingsController@website',
        ]);

        Route::post('/settings/website', [
            'as'   => 'root-settings-website-save',
            'uses' => 'Root\SettingsController@websiteSave',
        ]);

        Route::get('/settings/appearance', [
            'as'   => 'root-settings-appearance',
            'uses' => 'Root\SettingsController@appearance',
        ]);

        Route::post('/settings/appearance', [
            'as'   => 'root-settings-appearance-save',
            'uses' => 'Root\SettingsController@appearanceSave',
        ]);

        Route::post('/settings/css', [
            'as'   => 'root-settings-css-save',
            'uses' => 'Root\SettingsController@cssSave',
        ]);

        Route::get('/settings/social', [
            'as'   => 'root-settings-social',
            'uses' => 'Root\SettingsController@social',
        ]);

        Route::post('/settings/social', [
            'as'   => 'root-settings-social-save',
            'uses' => 'Root\SettingsController@socialSave',
        ]);

        Route::post('/settings/social-links', [
            'as'   => 'root-settings-social-links-save',
            'uses' => 'Root\SettingsController@socialLinksSave',
        ]);

        Route::get('/settings/social-links/{index}/delete', [
            'as'   => 'root-settings-social-links-delete',
            'uses' => 'Root\SettingsController@socialLinksDelete',
        ]);

        //=======USERS=======//

        Route::get('/users', [
            'as'   => 'root-users',
            'uses' => 'Root\UsersController@index',
        ]);

        Route::get('/users/add', [
            'as'   => 'root-users-new',
            'uses' => 'Root\UsersController@add',
        ]);

        Route::get('/users/edit/{user_id}', [
            'as'             => 'root-users-edit',
            'uses'           => 'Root\UsersController@edit',
        ])->where(['user_id' => '[0-9]+']);

        Route::post('/users/save/{user_id?}', [
            'as'             => 'root-users-save',
            'uses'           => 'Root\UsersController@store',
        ])->where(['user_id' => '[0-9]+']);

//=======MENU=======//

        Route::get('/menu', [
            'as'   => 'root-menu',
            'uses' => 'Root\MenuController@index',
        ]);

        Route::post('/menu', [
            'as'   => 'root-menu-save',
            'uses' => 'Root\MenuController@store',
        ]);

        Route::get('/menu/remove/{menu_id}', [
            'as'             => 'root-menu-remove',
            'uses'           => 'Root\MenuController@remove',
        ])->where(['menu_id' => '[0-9]+']);

        Route::get('/menu/up/{menu_id}', [
            'as'             => 'root-menu-up',
            'uses'           => 'Root\MenuController@up',
        ])->where(['menu_id' => '[0-9]+']);

        Route::get('/menu/down/{menu_id}', [
            'as'             => 'root-menu-down',
            'uses'           => 'Root\MenuController@down',
        ])->where(['menu_id' => '[0-9]+']);

//=======FILES=======//

        Route::any('/upload-image-ajax', [
            'as'   => 'root-upload-image-ajax',
            'uses' => 'Root\FilesController@uploadImageAjax',
        ]);

//=======STATIC PAGES=======//

        Route::get('/{page_name}', [
            'as'               => 'static-page',
            'uses'             => 'PagesController@view',
        ])->where(['page_name' => '[A-z0-9-_]+']);
    });
});
