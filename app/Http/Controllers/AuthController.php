<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use Hash;
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
            return Redirect::route('login', ['target' => $redirectTarget, 'error' => '1'])->withInput();
        }

        if (!Hash::check($password, $user->password)) {
            return Redirect::route('login', ['target' => $redirectTarget, 'error' => '2'])->withInput();
        }
        if ($user->active != '1') {
            return Redirect::route('login', ['target' => $redirectTarget, 'error' => '3'])->withInput();
        }

        Auth::login($user, $isRemember);

        return Redirect::route($redirectTarget);
    }
}
