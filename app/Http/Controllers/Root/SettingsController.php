<?php

namespace App\Http\Controllers\Root;

use App\Jobs\CreateSitemap;
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

    public function sitemap()
    {
        $data = [
            'title' => 'Sitemap.xml file',
        ];
        $this->title->prepend($data['title']);
        $this->title->prepend('Settings');
        View::share('menu_item_active', 'settings');

        return view('root.settings.sitemap', $data);
    }

    public function sitemapGenerate()
    {
        $this->dispatch(new CreateSitemap());

        Notifications::add('Sitemap generation scheduled', 'info');

        return Redirect::back();
    }

    public function website()
    {
        $data = [
            'title' => 'Website',
        ];
        $this->title->prepend('Settings');
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'settings');

        return view('root.settings.website', $data);
    }

    public function websiteSave()
    {
        Conf::set('app.sitename', Input::get('sitename'));
        Conf::set('app.url', Input::get('siteurl'));
        Conf::set('app.description', Input::get('site_description'));

        Conf::set('seo.index', Input::get('seo_index'));

        Conf::set('seo.default.seo_title', Input::get('site_title'));
        Conf::set('seo.default.seo_description', Input::get('seo_description'));
        Conf::set('seo.default.seo_keywords', Input::get('seo_keywords'));
        Notifications::add('Settings Saved', 'success');
        return Redirect::back();
    }


    public function appearance()
    {
        $data = [
            'title' => 'Appearance',
            'logo' => Conf::get('appearance.logo', null),
            'bg' => Conf::get('appearance.bg.image', null),
        ];
        $this->title->prepend('Settings');
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'settings');

        return view('root.settings.appearance', $data);
    }

    public function appearanceSave()
    {
        if (Input::hasFile('logo')) {
            $file = Input::file('logo');

            $path = public_path('upload');
            $filename = generate_filename($path, $file->getClientOriginalExtension());
            $file->move($path, $filename);

            Conf::set('appearance.logo', $filename);
        }

        if (Input::hasFile('background')) {
            $file = Input::file('background');

            $path = public_path('upload');
            $filename = generate_filename($path, $file->getClientOriginalExtension());
            $file->move($path, $filename);

            $bg = [
                'image' => $filename,
                'horizontal' => Input::get('horizontal', 'left'),
                'vertical' => Input::get('vertical', 'top'),
                'repeat' => Input::get('repeat', 'repeat'),
                'is_fixed' => Input::get('is_fixed', ''),
            ];

            Conf::set('appearance.bg', $bg);
        } else {
            Conf::set('appearance.bg.horizontal', Input::get('horizontal', 'left'));
            Conf::set('appearance.bg.vertical', Input::get('vertical', 'top'));
            Conf::set('appearance.bg.repeat', Input::get('repeat', 'repeat'));
            Conf::set('appearance.bg.is_fixed', Input::get('is_fixed', ''));
        }
        Conf::set('appearance.header.bg', Input::get('header_bg', '#FFFFFF'));
        Conf::set('appearance.menu.color', Input::get('menu_color', 'default'));

        Conf::set('appearance.footer.top_bg', Input::get('footer_top_bg', '#ecf0f1'));
        Conf::set('appearance.footer.top_text', Input::get('footer_top_text', '#2b4646'));
        Conf::set('appearance.footer.bottom_bg', Input::get('footer_bottom_bg', '#c7dae5'));
        Conf::set('appearance.footer.bottom_text', Input::get('footer_bottom_text', '#111111'));



        Notifications::add('Settings saved', 'success');

        return Redirect::route('root-settings-appearance');

    }


}
