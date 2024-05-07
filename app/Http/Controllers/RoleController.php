<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // dd('ok');
        $roles = Role::all();
        return view('roles/index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('roles/create');
    }

    public function store()
    {
        $role = request()->validate([
            'name' => ['required']
        ]);

        Role::create($role);
        User::find(Auth::user()->id)->assignRole($role);
        return redirect('roles');
    }

    public function edit(Role $role)
    {
        return view('roles/edit', ['role' => $role]);
    }

    public function update(Role $role)
    {

        request()->validate([
            'name' => ['required']
        ]);

        $role->update([
            'name' => request('name')
        ]);
        return redirect('roles');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('roles');
    }
}
