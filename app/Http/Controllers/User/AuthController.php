<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('users.auth.login');
    }

    public function loginPost(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','max:20'],
        ]);

        if(Auth::attempt($attributes))
        {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard/home');
        }
        // Auth::attempt(['email' => $email, 'password' => $password])


        return back()->withErrors([
            'email' => 'Wrong Credentials'
        ])->onlyInput('email');
    }

    public function registerForm()
    {

        return view('users.auth.register');
    }
    public function register(Request $request)
    {

        $attributes = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','max:20'],
            'name' => ['required']
        ]);

        User::create($attributes);

        return redirect()->route('auth.login')->with('sucess','5osh ylla');
    }

}
