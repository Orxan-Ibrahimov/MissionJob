<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('groups.index', ['groups' => Group::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Gate::inspect('create', Auth::user());
        if (!$response->allowed()) abort(403, $response->message());

        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);

        Group::create([
            'name' => request('name'),
            'head_teacher_id' => Auth::user()->id
        ]);


        return redirect('groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $response = Gate::inspect('edit', $group);
        if (!$response->allowed()) abort(403, $response->message());

        return view('groups.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Group $group)
    {
        $response = Gate::inspect('edit', $group);
        if (!$response->allowed()) abort(403, $response->message());

        $valid_group = request()->validate([
            'name' => ['required'],
        ]);

        $group->update($valid_group);
        return redirect('groups/' . $group->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
