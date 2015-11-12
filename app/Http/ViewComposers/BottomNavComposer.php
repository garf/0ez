<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class BottomNavComposer
{
    public function compose(View $view)
    {
        $items = \App\Models\Menu::where('position', 'bottom')->orderBy('sort', 'asc')->get();
        $view->with('items', $items);
    }
}
