<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use View;

class PostsController extends Controller
{
    public function index($slug = '')
    {
        if ($slug != '') {
            $category = Categories::i()->getBySlug($slug);
            if (empty($category)) {
                abort(404);
            }
            $category_id = $category->id;
            View::share('active_category', $category_id);
            View::share('seo_title', 'Категория: '.$category->seo_title);
            View::share('seo_description', $category->seo_description);
            View::share('seo_keywords', $category->seo_keywords);
            $this->title->prepend('Категория: '.$category->seo_title);
        } else {
            $category = null;
            $category_id = null;
        }

        $data = [
            'posts'    => Posts::i()->getPostsByCategoryId($category_id),
            'category' => $category,
        ];

        return view('site.posts.index', $data);
    }

    public function view($slug)
    {
        $post = Posts::i()->getBySlug($slug);
        View::share('seo_title', $post->seo_title);
        View::share('seo_description', $post->seo_description);
        View::share('seo_keywords', $post->seo_keywords);
        $this->title->prepend($post->seo_title);

        if ($post->status == 'active') {
            $post->increment('views');
        }

        return view('site.posts.view', ['post' => $post]);
    }

    public function tag($tag)
    {
        $data = [
            'posts' => Posts::i()->getPostsByTag($tag),
            'title' => 'Тэг: '.$tag,
        ];
        View::share('seo_title', $data['title']);
        $this->title->prepend($data['title']);

        return view('site.posts.index', $data);
    }
}
