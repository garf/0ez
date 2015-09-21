<?php

namespace app\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Users;
use Input;
use Notifications;
use Redirect;
use View;

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
            'title'    => 'New User',
            'user'     => null,
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
            'title'    => 'Edit User '.$user->name,
            'user'     => $user,
            'save_url' => route('root-users-save', ['user_id' => $user->id]),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'users');

        return view('root.users.user', $data);
    }

    public function store(Requests\StoreUserRequest $request, $user_id = null)
    {
        $user = Users::findOrNew($user_id);

        $user->email = Input::get('email');
        $user->name = Input::get('name');
        $user->role = Input::get('role');

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
