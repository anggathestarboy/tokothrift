<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

 

    public function action (RegisterRequest $request) {
        $data = array(
            'user_username' => $request->input('user_username'),
            'user_nohp' => $request->input('user_nohp'),
            'user_fullname' => $request->input('user_fullname'),
            'user_email' => $request->input('user_email'),
            'user_alamat' => $request->input('user_alamat'),
            'user_password' => bcrypt($request->input('user_password')),
        );
        $operation = User::create($data);

        if ($operation) {
            return redirect()->back()->with('success', 'Successfully register account!');
        } else {
            return redirect()->back()->with('error', 'Failed when register account!');
        }
    }
}

