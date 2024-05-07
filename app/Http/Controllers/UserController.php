<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users/index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users/show', ['user' => $user]);
    }

 
    // public function update(Role $role)
    // {

    //     request()->validate([
    //         'name' => ['required']
    //     ]);

    //     $role->update([
    //         'name' => request('name')
    //     ]);
    //     return redirect('roles');
    // }   
}