<?php

namespace App\Http\Controllers\Root;

use App\Models\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Redirect;

class MenuController extends Controller
{
    public function index()
    {
        $data = [
            'items' => Menu::orderBy('position', 'asc')->orderBy('sort', 'asc')->get(),
            'title' => 'Menu',
        ];

        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'menu');

        return view('root.menu.index', $data);
    }
}
