<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Menu;
use Notifications;
use Redirect;
use Title;

class MenuController extends Controller
{
    public function __construct()
    {
        Title::prepend('Admin');
    }

    public function index()
    {
        Title::prepend('Menu');

        $data = [
            'items' => Menu::orderBy('position', 'asc')->orderBy('sort', 'asc')->get(),
            'title' => Title::renderr(' : ', true),
        ];

        view()->share('menu_item_active', 'menu');

        return view('root.menu.index', $data);
    }

    public function store(Requests\StoreMenuRequest $request, $id = null)
    {
        $menu = Menu::findOrNew($id);

        $menu->parent_id = 0;
        $menu->title = $request->get('title');
        $menu->url = $request->get('url');
        $menu->position = $request->get('position', 'top');
        $menu->active_item = $request->get('active_item');
        $menu->on_blank = $request->has('on_blank');
        $menu->sort = $request->has('sort');
        $menu->save();

        Notifications::add('Menu item added', 'success');

        return redirect()->route('root-menu');
    }

    public function remove($menu_id)
    {
        Menu::destroy($menu_id);

        Notifications::add('Menu item removed', 'success');

        return Redirect::route('root-menu');
    }

    public function up($menu_id)
    {
        $this->_moveMenuItem($menu_id, '<');

        return redirect()->route('root-menu');
    }

    public function down($menu_id)
    {
        $this->_moveMenuItem($menu_id, '>');

        return redirect()->route('root-menu');
    }

    private function _moveMenuItem($menu_id, $operator)
    {
        $menu = Menu::find($menu_id);

        $order = ($operator == '>') ? 'asc' : 'desc';

        $neighbour = Menu::where('sort', $operator, $menu->sort)->orderBy('sort', $order)->first();

        if (empty($neighbour)) {
            return false;
        }

        $old_sort = $menu->sort;

        $menu->sort = $neighbour->sort;
        $neighbour->sort = $old_sort;

        $menu->save();
        $neighbour->save();

        return true;
    }
}
