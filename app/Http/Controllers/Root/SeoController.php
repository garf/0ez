<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use Redirect;
use Conf;

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

    public function counters()
    {
        $data = [
            'title' => 'Meta and Counters',
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'seo');

        return view('root.seo.counters', $data);
    }

    public function saveCounters()
    {
        $counters = [
            'google_analytics' => Input::get('google_analytics', ''),
            'yandex_metrika' => Input::get('yandex_metrika', ''),
        ];
        Conf::set('seo.counters', $counters);
        Conf::set('seo.more_meta', Input::get('more_meta', ''));
        return Redirect::route('root-counters');
    }
}
