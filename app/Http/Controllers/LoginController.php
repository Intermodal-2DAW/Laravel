<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginForm()
    {

    return view('auth.login');
    }
    //
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');


        if (Auth::attempt($credentials))
        {
            // Authentication successful
            return redirect()->intended(route('posts.index'));

        } else {
            $error = 'Wrong user';
            return view('auth.login', compact('error'));
        }
    }

    public function logout()
    {
        Auth::logout();
        // ... render the desired view
        return view('posts.index');
    }
}
