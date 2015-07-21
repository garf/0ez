<?php

namespace App\Http\Controllers\Root;

use App\Models\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Categories',
            'categories' => Categories::i()->allWithPostsCount(),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'categories');
        return view('root.categories.index', $data);
    }
}
