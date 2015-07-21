<?php

namespace App\Http\Controllers\Root;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\PostTag;
use App\Models\Tags;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use Auth;
use Redirect;

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

    public function newPost()
    {
        $data = [
            'categories' => Categories::all(),
            'title' => 'New Post',
            'post' => null,
            'save_url' => route('root-posts-store'),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'posts');

        return view('root.blog.post', $data);
    }

    public function store($post_id=null)
    {
        $post = Posts::findOrNew($post_id);

        if(empty($post)) {
            Redirect::back()->withInput();
        }

        $seo_title = (Input::get('seo_title', '') != '') ? Input::get('seo_title') : Input::get('title');

        if(Input::hasFile('img')) {
            $filename = $this->_uploadMiniature(Input::file('img'));
            $post->img = $filename;
        }

        $post->user_id = Auth::user()->id;
        $post->category_id = Input::get('category_id');
        $post->title = Input::get('title');
        $content = explode('<!--more-->', Input::get('content'));
        $post->excerpt = (count($content) == 2) ? $content[0] . '</p>' : '';
        $post->content = Input::get('content');
        $post->slug = str_slug($seo_title, '-');
        $post->seo_title = strip_tags($seo_title);
        $post->seo_description = strip_tags(Input::get('seo_description'));
        $post->seo_keywords = strip_tags(Input::get('seo_keywords'));
        $post->seo_keywords = mb_strtolower(strip_tags(Input::get('seo_keywords')));
        $post->status = Input::get('status');
        $post->published_at = Input::get('published_at');
        $post->save();

        $this->_setTags(Input::get('tags'), $post->id);

        return Redirect::route('root-post-edit', ['post_id' => $post->id]);
    }

    public function edit($post_id)
    {
        $post = Posts::with('tags')->find($post_id);
        $data = [
            'categories' => Categories::all(),
            'post' => $post,
            'title' => $post->id . ' : Edit Post',
            'save_url' => route('root-posts-store', ['post_id' => $post_id]),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'posts');

        return view('root.blog.post', $data);

    }

    private function _setTags($tags_str, $post_id)
    {
        PostTag::where('post_id', $post_id)->delete();

        $tags = explode(', ', $tags_str);

        foreach ($tags as $tag) {
            $tag = mb_strtolower($tag);
            $dbtag = Tags::where('tag', 'like', $tag)->first();
            if (empty($dbtag)) {
                $dbtag = new Tags;
                $dbtag->tag = strip_tags($tag);
                $dbtag->save();
            }
            $post_tag = new PostTag;

            $post_tag->post_id = $post_id;
            $post_tag->tag_id = $dbtag->id;
            $post_tag->save();
        }
    }

    private function _uploadMiniature($file)
    {
        $path = public_path('upload');
        $filename = generate_filename($path, $file->getClientOriginalExtension());
        $file->move($path, $filename);
        return $filename;
    }
}
