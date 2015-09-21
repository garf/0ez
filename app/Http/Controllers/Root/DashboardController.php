<?php

namespace app\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Users;
use View;

class DashboardController extends Controller
{
    public function index()
    {
        View::share('menu_item_active', 'index');
        $data = [
            'title'            => 'Dashboard',
            'posts_total'      => Posts::count(),
            'posts_active'     => Posts::where('status', 'active')->count(),
            'posts_draft'      => Posts::where('status', 'draft')->count(),
            'posts_moderation' => Posts::where('status', 'moderation')->count(),
            'users_total'      => Users::count(),
            'users_active'     => Users::where('active', '1')->count(),
            'users_inactive'   => Users::where('active', '0')->count(),
            'latest_posts'     => Posts::active()->orderBy('published_at', 'desc')->limit(5)->get(),
            'popular_posts'    => Posts::active()->orderBy('views', 'desc')->limit(5)->get(),
        ];
        $this->title->prepend($data['title']);

        return view('root.dashboard.index', $data);
    }
}
