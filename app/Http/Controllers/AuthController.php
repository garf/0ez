<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Auth;
use Hash;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Notifications;
use Redirect;
use Title;

class AuthController extends Controller
{
    public function __construct()
    {
        Title::prepend('Authentication');
    }

    public function login()
    {
        return view('site.auth.login', []);
    }

    public function loginPost(Request $request)
    {
        $redirectTarget = ($request->has('target')) ? $request->get('target') : 'root-index';

        $email = trim($request->get('email', ''));
        $password = trim($request->get('password', ''));
        $isRemember = $request->has('remember');

        $user = Users::where('email', $email)->first();

        if (empty($user)) {
            Notifications::add('User not registered', 'danger', 'login');

            return Redirect::route('login', ['target' => $redirectTarget])->withInput();
        }

        if (!Hash::check($password, $user->password)) {
            Notifications::add('Wrong password', 'danger', 'login');

            return Redirect::route('login', ['target' => $redirectTarget])->withInput();
        }
        if ($user->active != '1') {
            Notifications::add('User is not allowed to log in', 'danger', 'login');

            return Redirect::route('login', ['target' => $redirectTarget])->withInput();
        }

        try {
            Auth::login($user, $isRemember);
        } catch (QueryException $e) {
            //just for demo purposes
        }

        return Redirect::route($redirectTarget);
    }

    public function logout()
    {
        auth()->logout();

        return Redirect::route('login');
    }
}
