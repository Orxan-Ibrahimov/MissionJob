<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth/session');
    }

    public function store()
    {
        $valid_user = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($valid_user))
            throw ValidationException::withMessages([
                'password' => 'email or password is incorrect!'
            ]);

        request()->session()->regenerate();
        return view('/home', ['user' => Auth::user()]);
    }
    public function destroy()
    {
        Auth::logout();
        return view('auth/session');
    }
}
