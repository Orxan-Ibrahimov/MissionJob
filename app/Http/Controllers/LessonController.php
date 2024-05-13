<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LessonController extends Controller
{
    public function index()
    {

        return view('lessons.index', ['lessons' => Lesson::all()]);
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show', ['lesson' => $lesson]);
    }

    public function create(Request $request)
    {
        $group = Group::find($request['group']);
        $response = Gate::inspect('edit', $group);
        if (!$response->allowed()) abort(403, $response->message());
        
        return view('lessons.create', ['group_id' => $request['group']]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'group_id' => ['required']
        ]);


        $lesson = Lesson::create([
            'name' => request('name'),
            'group_id' => request('group_id')
        ]);
        return redirect('groups/' . $lesson->group -> id);
    }
}
