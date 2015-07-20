<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class DashboardController extends Controller
{
    public function index()
    {
        View::share('menu_item_active', 'index');
        $data = [];
        return view('root.dashboard.index', $data);
    }
}
