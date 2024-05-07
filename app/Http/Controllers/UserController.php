<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users/index', ['users' => $users]);
    }

    public function show(User $user)
    {
       
        $rest_array = [];
       
        foreach (Role::all() as $role) {
            if ($role->name === 'administrator') continue;
            $none = true;
            foreach ($user->roles as $user_role) {
                if ($user_role->id == $role->id) $none = false;
            }
            if ($none) array_push($rest_array, $role);
        }
       
        // dd(empty($rest_array));
        return view('users/show', ['user' => $user, 'rest_roles' => $rest_array]);
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
