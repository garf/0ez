<?php

namespace app\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\PostTag;
use App\Models\Tags;
use Auth;
use Input;
use Notifications;
use Pinger;
use Redirect;
use View;

class PostsController extends Controller
{
    public function index()
    {
        if (Input::has('status')) {
            $posts = Posts::with('category')->byStatus(Input::get('status'))->sort()->paginate(20);
        } else {
            $posts = Posts::with('category')->whereNotIn('status', ['deleted', 'refused'])->sort()->paginate(20);
        }
        $data = [
            'posts'      => $posts,
            'title'      => 'Posts',
            'categories' => Categories::all(),
        ];

        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'posts');

        return view('root.posts.index', $data);
    }

    public function newPost()
    {
        $data = [
            'categories' => Categories::all(),
            'title'      => 'New Post',
            'post'       => null,
            'save_url'   => route('root-posts-store'),
            'tags'       => Tags::all(),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'posts');

        return view('root.posts.post', $data);
    }

    public function store(Requests\StorePostRequest $request, $post_id = null)
    {
        $post = Posts::findOrNew($post_id);

        if (empty($post)) {
            Redirect::back()->withInput();
        }

        $seo_title = (Input::get('seo_title', '') != '') ? Input::get('seo_title') : Input::get('title');

        if (Input::hasFile('img')) {
            $filename = $this->_uploadMiniature(Input::file('img'));
            $post->img = $filename;
        }

        $post->user_id = Auth::user()->id;
        $post->category_id = Input::get('category_id');
        $post->title = Input::get('title');
        $content = explode('<!--more-->', Input::get('content'));
        $post->excerpt = (count($content) == 2) ? $content[0].'</p>' : '';
        $post->content = Input::get('content');
//        $post->slug = str_slug($seo_title, '-');
        $post->seo_title = strip_tags($seo_title);
        $post->seo_description = strip_tags(Input::get('seo_description'));
        $post->seo_keywords = mb_strtolower(strip_tags(Input::get('seo_keywords')));
        $post->status = Input::get('status');
        $post->published_at = Input::get('published_at');
        $post->save();

        $this->_setTags(Input::get('tags'), $post->id);

        if (Input::has('ping')) {
            Pinger::pingAll($post->title, route('view', ['slug' => $post->slug]));
        }

        Notifications::add('Blog post saved', 'success');

        return Redirect::route('root-post-edit', ['post_id' => $post->id]);
    }

    public function edit($post_id)
    {
        $post = Posts::with('tags')->find($post_id);
        $data = [
            'categories' => Categories::all(),
            'post'       => $post,
            'title'      => $post->id.' : Edit Post',
            'save_url'   => route('root-posts-store', ['post_id' => $post_id]),
            'tags'       => Tags::all(),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'posts');

        return view('root.posts.post', $data);
    }

    public function pin($post_id)
    {
        $this->_setPinnedStatus($post_id, true);
        Notifications::add('Post pinned', 'success');

        return Redirect::back();
    }

    public function unpin($post_id)
    {
        $this->_setPinnedStatus($post_id, false);
        Notifications::add('Post unpinned', 'success');

        return Redirect::back();
    }

    public function toDraft($post_id)
    {
        $this->_setPostStatus($post_id, 'draft');
        Notifications::add('Post sent to drafts', 'success');

        return Redirect::back();
    }

    public function toActive($post_id)
    {
        $this->_setPostStatus($post_id, 'active');
        Notifications::add('Post published', 'success');

        return Redirect::back();
    }

    public function toDeleted($post_id)
    {
        $this->_setPostStatus($post_id, 'deleted');
        Notifications::add('Post deleted', 'success');

        return Redirect::back();
    }

    public function toCategory($post_id, $category_id)
    {
        $category = Categories::find($category_id);

        if (empty($category)) {
            Notifications::add('Category doesn\'t exist', 'danger');

            return Redirect::back();
        }

        $post = Posts::find($post_id);
        $post->category_id = $category_id;
        $post->save();

        Notifications::add('Post "'.str_limit($post->title, '35', '...').'" moved to category "'.e($category->title).'"', 'info');

        return Redirect::back();
    }

    private function _setPinnedStatus($post_id, $status)
    {
        $post = Posts::find($post_id);
        $post->is_pinned = $status;
        $post->save();

        return $post;
    }

    private function _setPostStatus($post_id, $status)
    {
        $post = Posts::find($post_id);
        $post->status = $status;
        $post->save();

        return $post;
    }

    private function _setTags($tags_str, $post_id)
    {
        PostTag::where('post_id', $post_id)->delete();

        $tags = explode(', ', $tags_str);

        foreach ($tags as $tag) {
            if (trim($tag) == '') {
                continue;
            }
            $tag = mb_strtolower($tag);
            $dbtag = Tags::where('tag', 'like', $tag)->first();
            if (empty($dbtag)) {
                $dbtag = new Tags();
                $dbtag->tag = strip_tags($tag);
                $dbtag->save();
            }
            $post_tag = new PostTag();

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
