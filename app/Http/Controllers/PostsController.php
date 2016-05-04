<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Title;
use Conf;

class PostsController extends Controller
{
    public function __construct()
    {
        Title::prepend(Conf::get('app.sitename'));
    }

    public function index($slug = '')
    {
        if ($slug != '') {
            $category = Categories::i()->getBySlug($slug);
            if (empty($category)) {
                abort(404);
            }
            $category_id = $category->id;
            view()->share('active_category', $category_id);
            view()->share('seo_title', 'Категория: '.$category->seo_title);
            view()->share('seo_description', $category->seo_description);
            view()->share('seo_keywords', $category->seo_keywords);
            
            Title::prepend('Категория');
            Title::prepend($category->seo_title);
        } else {
            Title::append(Conf::get('seo.default.seo_title'));
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
        view()->share('seo_title', $post->seo_title);
        view()->share('seo_description', $post->seo_description);
        view()->share('seo_keywords', $post->seo_keywords);
        Title::prepend($post->seo_title);

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
        view()->share('seo_title', $data['title']);
        $this->title->prepend($data['title']);

        return view('site.posts.index', $data);
    }
}
