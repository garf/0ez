<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Static Pages',
        ];
        $this->title->prepend($data['title']);

        return view('root.pages.index');
    }
}
