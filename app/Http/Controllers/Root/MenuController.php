<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Menu;
use Input;
use Notifications;
use Redirect;
use View;

class MenuController extends Controller
{
    public function index()
    {
        $data = [
            'items' => Menu::orderBy('position', 'asc')->orderBy('sort', 'asc')->get(),
            'title' => 'Menu',
        ];

        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'menu');

        return view('root.menu.index', $data);
    }

    public function store(Requests\StoreMenuRequest $request, $id = null)
    {
        $menu = Menu::findOrNew($id);

        $menu->parent_id = 0;
        $menu->title = Input::get('title');
        $menu->url = Input::get('url');
        $menu->position = Input::get('position', 'top');
        $menu->active_item = Input::get('active_item');
        $menu->on_blank = Input::has('on_blank');
        $menu->sort = Input::has('sort');
        $menu->save();

        Notifications::add('Menu item added', 'success');

        return Redirect::route('root-menu');
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

        return Redirect::route('root-menu');
    }

    public function down($menu_id)
    {
        $this->_moveMenuItem($menu_id, '>');

        return Redirect::route('root-menu');
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
