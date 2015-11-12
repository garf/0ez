<?php

namespace App\Http\ViewComposers\Root;

use Illuminate\Contracts\View\View;

class TopNavComposer
{
    public function compose(View $view)
    {
        $menu_items_left = [
            [
                'url'   => route('root-index'),
                'title' => 'Dashboard',
                'route' => 'root-index',
                'item'  => 'index',
                'class' => '',
                'icon'  => 'fa fa-dashboard',
                'id'    => '',
                'blank' => false,
            ],
            [
                'url'   => route('root-posts'),
                'title' => 'Posts',
                'route' => 'root-posts',
                'item'  => 'posts',
                'class' => '',
                'icon'  => 'fa fa-newspaper-o',
                'id'    => '',
                'blank' => false,
            ],
            [
                'url'   => route('root-categories'),
                'title' => 'Categories',
                'route' => 'root-categories',
                'item'  => 'categories',
                'class' => '',
                'icon'  => 'fa fa-folder-o',
                'id'    => '',
                'blank' => false,
            ],
            [
                'url'   => route('root-tags'),
                'title' => 'Tags',
                'route' => 'root-tags',
                'item'  => 'tags',
                'class' => '',
                'icon'  => 'fa fa-tags',
                'id'    => '',
                'blank' => false,
            ],
            [
                'url'   => route('root-menu'),
                'title' => 'Menu',
                'route' => 'root-menu',
                'item'  => 'menu',
                'class' => '',
                'icon'  => 'fa fa-bars',
                'id'    => '',
                'blank' => false,
            ],
            [
                'url'   => route('root-users'),
                'title' => 'Users',
                'route' => 'root-users',
                'item'  => 'users',
                'class' => '',
                'icon'  => 'fa fa-users',
                'id'    => '',
                'blank' => false,
            ],
            [
                'url'   => route('root-settings'),
                'title' => 'Settings',
                'route' => 'root-settings',
                'item'  => 'settings',
                'class' => '',
                'icon'  => 'fa fa-wrench',
                'id'    => '',
                'blank' => false,
            ],
        ];

        $menu_items_right = [
            [
                'url'   => route('index'),
                'title' => 'Index Page',
                'route' => 'index',
                'item'  => '',
                'class' => '',
                'icon'  => 'fa fa-crosshairs',
                'id'    => '',
                'blank' => true,
            ],
            [
                'url'   => route('logout'),
                'title' => 'Log Out',
                'route' => 'root-logout',
                'item'  => '',
                'class' => '',
                'icon'  => 'fa fa-power-off',
                'id'    => '',
                'blank' => false,
            ],
        ];
        $view->with('menu_items_left', $menu_items_left)->with('menu_items_right', $menu_items_right);
    }
}
