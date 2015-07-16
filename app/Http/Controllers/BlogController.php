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
        return 'view post ' . $slug;
    }
}
