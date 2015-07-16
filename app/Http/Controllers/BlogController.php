<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Agent;
use View;

class BlogController extends Controller
{

    public function index($slug='')
    {
        if($slug != '') {
            $category = Categories::i()->getBySlug($slug);
            if (empty($category)) {
                abort(404);
            }
            $category_id = $category->id;
            View::share('active_category', $category_id);
            View::share('seo_title', 'Категория: ' . $category->seo_title);
            View::share('seo_description', $category->seo_description);
            View::share('seo_keywords', $category->seo_keywords);
        } else {
            $category = null;
            $category_id = null;
        }

        $data = [
            'posts' => Posts::i()->getPostsByCategoryId($category_id),
            'category' => $category,
        ];

        return view('site.blog.index', $data);
    }

    public function view($slug)
    {
        $post = Posts::i()->getBySlug($slug);
        View::share('seo_title', $post->seo_title);
        View::share('seo_description', $post->seo_description);
        View::share('seo_keywords', $post->seo_keywords);
        return view('site.blog.view', ['post' => $post]);
    }
}
