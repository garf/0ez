<?php

namespace App\Http\ViewComposers;

use Conf;
use Illuminate\Contracts\View\View;

class SocialLinksComposer
{

    public function compose(View $view)
    {
        $view->with('services', Conf::get('social.links'));
    }

}