<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Lesson;
use Illuminate\Http\Request;

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
        return redirect('lessons/' . $lesson->id);
    }
}
