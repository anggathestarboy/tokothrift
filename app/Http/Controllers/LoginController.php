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

    public function action(LoginRequest $request) {
    $credentials = [
        'user_email' => $request->input('user_email'),
        'user_password' => $request->input('user_password')
    ];

    $user = User::getUserByEmail($credentials['user_email']);

    if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
        Auth::login($user);

        if ($user->user_level === "Admin") {
            return redirect('/admin');
        } elseif ($user->user_level === "Pengguna") {
            return redirect('/user/dashboard');
        } else {
            Auth::logout();
            return redirect()->back()->with('error', 'Role tidak dikenali!');
        }
    }

    return redirect()->back()->with('error', 'Username atau Password salah!');
}


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
