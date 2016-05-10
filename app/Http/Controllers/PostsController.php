<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Database\QueryException;
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

        $q = request('q', null);

        if (!empty($q)) {
        }

        $posts = Posts::i()->getPostsByCategoryId($category_id, $q);

        $data = [
            'posts'    => $posts,
            'category' => $category,
            'q' => $q,
            'title' => Title::renderr(' : ', true),
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

        try {
            if ($post->status == 'active') {
                $post->increment('views');
            }
        } catch (QueryException $e) {
            //This is just for demo purposes.
        }

        return view('site.posts.view', ['post' => $post]);
    }

    public function tag($tag)
    {
        Title::prepend('Тэг: '.$tag);

        $data = [
            'posts' => Posts::i()->getPostsByTag($tag),
            'title' => Title::renderr(' : ', true),
            'q' => '',
        ];
        view()->share('seo_title', $data['title']);

        return view('site.posts.index', $data);
    }
}
