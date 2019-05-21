<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm(Request $request)
    {
        return view('modules.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('get.home');
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('get.login');
    }

}
