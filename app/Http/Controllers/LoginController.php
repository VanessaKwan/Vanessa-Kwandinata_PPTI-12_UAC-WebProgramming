<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {

        return view('register');
    }

    public function login() {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->intended('/home')->with('logoutSuccess', 'Successfully logged out');
    }
}
