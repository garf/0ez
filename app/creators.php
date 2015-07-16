<?php

view()->creator('site.partials.categories-menu', function($view) {
    $categories = \App\Models\Categories::i()->withPostsCount();
    $posts_count = \App\Models\Posts::active()->count();
    $view->with('categories', $categories)->with('posts_count', $posts_count);
});