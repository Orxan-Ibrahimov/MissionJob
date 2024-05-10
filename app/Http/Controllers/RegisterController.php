<?php

namespace App\Http\Controllers;

use App\Mail\UserSigned;
use App\Models\User;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Nette\Utils\Random;

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
            'email' => ['required', 'email'],
            'gender' => ['required'],
            'password' => ['required', 'confirmed', Password::min(7)]
        ]);

        if ($valid_user['gender'] === 'man')
            $valid_user['profile'] = Paths::filePaths([request()->getSchemeAndHttpHost()], [Paths::filePaths(['uploads'], [Paths::filePaths(['image'], [Paths::filePaths(['avatar'], ['avatar_s_m.jpg'])[0]])[0]])[0]])[0];
        else if ($valid_user['gender'] === 'man')
            $valid_user['profile'] = Paths::filePaths([request()->getSchemeAndHttpHost()],  [Paths::filePaths(['uploads'], [Paths::filePaths(['image'], [Paths::filePaths(['avatar'], ['avatar_s_w.jpg'])[0]])[0]])[0]])[0];


        $user = User::create($valid_user);
        $user->assignRole('student');
        Mail::to($valid_user['email'])->send(new UserSigned());

        return redirect('/');
    }
}
