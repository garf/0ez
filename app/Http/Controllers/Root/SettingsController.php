<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use Redirect;
use Conf;
use Notifications;

class SettingsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Settings',
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'settings');

        return view('root.settings.index', $data);
    }

    public function counters()
    {
        $data = [
            'title' => 'Meta and Counters',
        ];
        $this->title->prepend('Settings');
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'settings');

        return view('root.settings.counters', $data);
    }

    public function countersSave()
    {
        $counters = [
            'google_analytics' => Input::get('google_analytics', ''),
            'yandex_metrika' => Input::get('yandex_metrika', ''),
        ];
        Conf::set('seo.counters', $counters);
        Conf::set('seo.more_meta', Input::get('more_meta', ''));
        Notifications::add('Counters info saved', 'success');
        return Redirect::route('root-counters');
    }

    public function robotsTxt()
    {
        if (!file_exists(public_path('robots.txt'))) {
            file_put_contents(public_path('robots.txt'), '');
        }
        if (!file_exists(public_path('humans.txt'))) {
            file_put_contents(public_path('humans.txt'), '');
        }

        $data = [
            'title' => 'robots.txt file',
            'robots_txt' => file_get_contents(public_path('robots.txt')),
            'humans_txt' => file_get_contents(public_path('humans.txt')),
        ];
        $this->title->prepend($data['title']);
        $this->title->prepend('Settings');
        View::share('menu_item_active', 'settings');

        return view('root.settings.robots-txt', $data);
    }

    public function robotsTxtSave()
    {
        file_put_contents(public_path('robots.txt'), Input::get('robots_txt', ''));
        file_put_contents(public_path('humans.txt'), Input::get('humans_txt', ''));
        Notifications::add('robots.txt and humans.txt file saved', 'success');
        return Redirect::route('root-robots-txt');
    }
}
