<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function index()
    {
        $data = [
            'posts' => Posts::active()->paginate(10),
        ];
        return view('site.blog.index', $data);
    }
}
