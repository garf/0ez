<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class SeoController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'SEO Instruments',
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'seo');

        return view('root.seo.index', $data);
    }
}
