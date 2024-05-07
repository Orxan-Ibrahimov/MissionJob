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

    public function create()
    {
        return view('users/create');
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