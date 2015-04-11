<?php namespace Dymantic\Http\Controllers\Auth;

use Dymantic\Http\Requests;
use Dymantic\Http\Controllers\Controller;
use Dymantic\Http\Requests\LoginFormRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(LoginFormRequest $request, Guard $auth)
    {
        if($auth->attempt($request->only('email', 'password'), $request->has('remember')))
        {
            return redirect('/admin');
        }

        return redirect()->back()->withInput();
    }

    public function logout(Guard $auth)
    {
        $auth->logout();

        return redirect('/');
    }
}
