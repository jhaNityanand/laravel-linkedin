<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $title = 'Login | LinkedIn';
        return view('authentication.login', compact('title'));
    }

    public function register()
    {
        $title = 'Registration | LinkedIn';
        return view('authentication.register', compact('title'));
    }

    public function forgotPassword()
    {
        $title = 'Forgot Password | LinkedIn';
        return view('authentication.forgot-password', compact('title'));
    }

    public function recoverPassword($token)
    {
        $title = 'Recover Password | LinkedIn';
        return view('authentication.recover-password', compact('title'));
    }
}
