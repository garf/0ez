<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function view($page_name)
    {
        if (!view()->exists('site.pages.'.$page_name)) {
            return abort(404);
        }

        return view('site.pages.'.$page_name);
    }
}
