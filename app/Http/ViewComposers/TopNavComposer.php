<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class TopNavComposer
{
    public function compose(View $view)
    {
        $items = \App\Models\Menu::where('position', 'top')->orderBy('sort', 'asc')->get();
        $view->with('items', $items);
    }
}
