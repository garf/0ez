<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Users;
use Title;

class DashboardController extends Controller
{
    public function __construct()
    {
        Title::prepend('Admin');
    }

    public function index()
    {
        view()->share('menu_item_active', 'index');
        Title::prepend('Dashboard');

        $data = [
            'title'            => Title::renderr(' : ', true),
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

        return view('root.dashboard.index', $data);
    }
}
