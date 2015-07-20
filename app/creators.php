<?php

view()->creator('site.partials.categories-menu', function($view) {
    $categories = \App\Models\Categories::i()->withPostsCount();
    $posts_count = \App\Models\Posts::active()->count();
    $view->with('categories', $categories)->with('posts_count', $posts_count);
});

view()->creator('root.partials.top-nav', function($view) {
    $menu_items_left = [
        [
            'url' => route('root-index'),
            'title' => 'Dashboard',
            'route' => 'root-index',
            'item' => 'index',
            'class' => '',
            'id' => '',
            'blank' => false,
        ],
        [
            'url' => route('root-posts'),
            'title' => 'Posts',
            'route' => 'root-posts',
            'item' => 'posts',
            'class' => '',
            'id' => '',
            'blank' => false,
        ],
        [
            'url' => route('root-index'),
            'title' => 'Categories',
            'route' => 'root-categories',
            'item' => 'categories',
            'class' => '',
            'id' => '',
            'blank' => false,
        ],
        [
            'url' => route('root-index'),
            'title' => 'Users',
            'route' => 'root-users',
            'item' => 'users',
            'class' => '',
            'id' => '',
            'blank' => false,
        ],
    ];

    $menu_items_right = [
        [
            'url' => route('index'),
            'title' => 'Index Page',
            'route' => 'index',
            'item' => '',
            'class' => '',
            'id' => '',
            'blank' => true,
        ],
        [
            'url' => route('logout'),
            'title' => 'Log Out',
            'route' => 'root-logout',
            'item' => '',
            'class' => '',
            'id' => '',
            'blank' => false,
        ],
    ];
    $view->with('menu_items_left', $menu_items_left)->with('menu_items_right', $menu_items_right);
});