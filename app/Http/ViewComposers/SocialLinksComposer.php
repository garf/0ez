<?php

namespace App\Http\ViewComposers;

use Conf;
use Illuminate\Contracts\View\View;

class SocialLinksComposer
{
    public function compose(View $view)
    {
        $links = Conf::get('social.links');
        if (!isset($links[0]['url'])) {
            $links = [];
            Conf::set('social.links', $links);
        }
        $view->with('services', $links);
    }
}
