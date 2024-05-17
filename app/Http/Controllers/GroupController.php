<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Perspective;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\isNull;

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
    public function create(Request $request)
    {
        $currentUser =  Auth::user();

        $response = Gate::inspect('create', $currentUser);
        if (!$response->allowed()) abort(403, $response->message());

        $perspective = Perspective::find($request['perspective']);
        $users = User::get()->except($currentUser->id)-> where('group_id', null);
        $users = [
            'teachers' =>  $users->filter(
                fn ($user) => !$user->hasRole(['administrator', 'manager', 'supervisor', 'head-teacher']) && $user->hasRole('teacher')
            ),
            'mentors' =>   $users->filter(
                fn ($user) => !$user->hasRole(['administrator', 'manager', 'supervisor', 'head-teacher', 'teacher']) && $user->hasRole('mentor')
            ),
            'students' =>  $users->filter(
                fn ($user) => !$user->hasRole(['administrator', 'manager', 'supervisor', 'head-teacher', 'teacher', 'mentor']) && $user->hasRole('student')
            ),
        ];

        return view('groups.create', ['perspective' => $perspective, 'members' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);



        $group = Group::create([
            'name' => request('name'),
            'head_teacher_id' => Auth::user()->id,
            'perspective_id' => request('perspective')
        ]);
        $users = User::get();
        foreach (request('members') as $member) {
            $user = $users->find($member);
            $user->group_id = $group->id;
            $user->save();
        }

        return redirect('groups/' . $group->id);
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
