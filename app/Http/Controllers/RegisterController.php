<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth/register');
    }

    public function store()
    {
        $valid_user = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'nickname' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(7)]
        ]);

        User::create($valid_user);
        return redirect('/');
    }
}
