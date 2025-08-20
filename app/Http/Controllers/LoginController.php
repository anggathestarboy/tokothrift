<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

     public function action (LoginRequest $request) {
        $credentials = array(
            'user_email' => $request->input('user_email'),
            'user_password' => $request->input('user_password')
        );

        $user = User::getUserByEmail($credentials['user_email']);

        if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
            Auth::login($user);
            return redirect('/admin');
        }

        return redirect()->back()->with('error', 'Username or Password is wrong!');
    }
}
