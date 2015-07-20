<?php

namespace App\Http\Controllers\Root;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;

class BlogController extends Controller
{
    public function index()
    {
        if(Input::has('status')) {
            $posts = Posts::orderBy('published_at', 'desc')->where('status', Input::get('status'))->paginate(20);
        } else {
            $posts = Posts::orderBy('published_at', 'desc')->paginate(20);
        }
        $data = [
            'posts' => $posts,
            'title' => 'Posts List',
        ];

        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'posts');
        return view('root.blog.index', $data);
    }

    public function addPost()
    {
        $data = [
            'categories' => Categories::all(),
            'title' => 'New Post',
            'post' => null
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'posts');

        return view('root.blog.post', $data);
    }
}
