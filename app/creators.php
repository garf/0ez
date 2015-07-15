<?php

view()->creator('site.partials.categories-menu', function($view) {
    $categories = \App\Models\Categories::all();
    $view->with('categories', $categories);
});