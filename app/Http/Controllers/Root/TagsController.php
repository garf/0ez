<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Models\PostTag;
use App\Models\Tags;
use Notifications;
use Title;

class TagsController extends Controller
{
    public function __construct()
    {
        Title::prepend('Admin');
    }

    public function index()
    {
        Title::prepend('Tags');

        $data = [
            'title' => Title::renderr(' : ', true),
            'tags'  => Tags::i()->allWithPostsCount(),
        ];

        view()->share('menu_item_active', 'tags');

        return view('root.tags.index', $data);
    }

    public function clearOrphaned()
    {
        $tags = Tags::i()->allWithPostsCount();
        foreach ($tags as $tag) {
            if ($tag->num == 0) {
                Tags::destroy($tag->id);
            }
        }
        Notifications::add('Empty tags removed', 'success');

        return redirect()->back();
    }

    public function remove($tag_id)
    {
        Tags::destroy($tag_id);
        PostTag::where(['tag_id' => $tag_id])->delete();

        Notifications::add('Tag removed', 'success');

        return redirect()->back();
    }
}
