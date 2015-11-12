<?php

namespace App\Http\ViewComposers\Root;

use Illuminate\Contracts\View\View;

class SettingsMenuComposer
{
    public function compose(View $view)
    {
        $items = [
            [
                'title' => 'Website',
                'icon'  => 'fa-globe',
                'url'   => route('root-settings-website'),
                'route' => 'root-settings-website',
            ],
            [
                'title' => 'Appearance',
                'icon'  => 'fa-leaf',
                'url'   => route('root-settings-appearance'),
                'route' => 'root-settings-appearance',
            ],
            [
                'title' => 'Meta and Counters',
                'icon'  => 'fa-area-chart',
                'url'   => route('root-settings-counters'),
                'route' => 'root-settings-counters',
            ],
            [
                'title' => 'Social Integration',
                'icon'  => 'fa-facebook',
                'url'   => route('root-settings-social'),
                'route' => 'root-settings-social',
            ],
            [
                'title' => 'Robots.txt',
                'icon'  => 'fa-file-text-o',
                'url'   => route('root-settings-robots-txt'),
                'route' => 'root-settings-robots-txt',
            ],
            [
                'title' => 'Sitemap',
                'icon'  => 'fa-sitemap',
                'url'   => route('root-settings-sitemap'),
                'route' => 'root-settings-sitemap',
            ],
        ];

        $view->with('items', $items);
    }
}
