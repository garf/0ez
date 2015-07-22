<?php

namespace App\Http\Controllers\Root;

use App\Models\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Auth;
use Input;
use Redirect;

class UsersController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => Users::all(),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'users');

        return view('root.users.index', $data);
    }

}
