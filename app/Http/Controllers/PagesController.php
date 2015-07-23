<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function view($page_name)
    {
        if(!view()->exists('site.pages.' . $page_name)) {
            return abort(404);
        }

        return view('site.pages.' . $page_name);
    }
}
