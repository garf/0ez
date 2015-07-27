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
use Notifications;

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

    public function add()
    {
        $data = [
            'title' => 'New User',
            'user' => null,
            'save_url' => route('root-users-save'),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'users');

        return view('root.users.user', $data);
    }

    public function edit($user_id)
    {
        $user = Users::find($user_id);
        $data = [
            'title' => 'Edit User ' . $user->name,
            'user' => $user,
            'save_url' => route('root-users-save', ['user_id' => $user->id]),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'users');

        return view('root.users.user', $data);
    }

    public function store($user_id = null)
    {
        $user = Users::findOrNew($user_id);

        $user->email = Input::get('email');
        $user->name = Input::get('name');

        $password = trim(Input::get('password'));

        if ($password != '') {
            $user->password = Input::get('password');
            Notifications::add('Password changed', 'success');
        } else {
            Notifications::add('Password not changed', 'warning');
        }

        $user->active = Input::has('active');
        $user->save();

        Notifications::add('User saved', 'success');

        return Redirect::route('root-users');
    }
}
