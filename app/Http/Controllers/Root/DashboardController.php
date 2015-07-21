<?php

namespace App\Http\Controllers\Root;

use App\Models\Posts;
use App\Models\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class DashboardController extends Controller
{
    public function index()
    {
        View::share('menu_item_active', 'index');
        $data = [
            'title' => 'Dashboard',
            'posts_total' => Posts::count(),
            'posts_active' => Posts::where('status', 'active')->count(),
            'posts_draft' => Posts::where('status', 'draft')->count(),
            'posts_moderation' => Posts::where('status', 'moderation')->count(),
            'users_total' => Users::count(),
            'users_active' => Users::where('active', '1')->count(),
            'users_inactive' => Users::where('active', '0')->count(),
        ];
        $this->title->prepend($data['title']);
        return view('root.dashboard.index', $data);
    }

}
