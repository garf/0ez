<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Auth;
use Hash;
use Input;
use Notifications;
use Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('site.auth.login', []);
    }

    public function loginPost()
    {
        $redirectTarget = (Input::has('target')) ? Input::get('target') : 'root-index';

        $email = trim(Input::get('email', ''));
        $password = trim(Input::get('password', ''));
        $isRemember = Input::has('remember');

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

        Auth::login($user, $isRemember);

        return Redirect::route($redirectTarget);
    }

    public function logout()
    {
        auth()->logout();

        return Redirect::route('login');
    }
}
