<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Users;
use Notifications;
use Title;

class UsersController extends Controller
{
    public function __construct()
    {
        Title::prepend('Admin');
    }

    public function index()
    {
        Title::prepend('Users');
        $data = [
            'title' => Title::renderr(' : ', true),
            'users' => Users::all(),
        ];

        view()->share('menu_item_active', 'users');

        return view('root.users.index', $data);
    }

    public function add()
    {
        Title::prepend('New User');

        $data = [
            'title'    => Title::renderr(' : ', true),
            'user'     => null,
            'save_url' => route('root-users-save'),
        ];

        view()->share('menu_item_active', 'users');

        return view('root.users.user', $data);
    }

    public function edit($user_id)
    {
        $user = Users::find($user_id);

        Title::prepend('Edit User');
        Title::prepend($user->name);

        $data = [
            'title'    => Title::renderr(' : ', true),
            'user'     => $user,
            'save_url' => route('root-users-save', ['user_id' => $user->id]),
        ];

        view()->share('menu_item_active', 'users');

        return view('root.users.user', $data);
    }

    public function store(Requests\StoreUserRequest $request, $user_id = null)
    {
        $user = Users::findOrNew($user_id);

        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->role = $request->get('role');

        $password = trim($request->get('password'));

        if ($password != '') {
            $user->password = $request->get('password');
            Notifications::add('Password changed', 'success');
        } else {
            Notifications::add('Password not changed', 'warning');
        }

        $user->active = $request->has('active');
        $user->save();

        Notifications::add('User saved', 'success');

        return redirect()->route('root-users');
    }
}
