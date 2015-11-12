<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class SocialLinksComposer
{

    public function compose(View $view)
    {
        $view->with('services', trans('socials.services'));
    }

}