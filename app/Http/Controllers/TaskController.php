<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\TaskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $lesson = Lesson::find($request['lesson']);
        $task_types = TaskType::get();
        return view('tasks.create', ['lesson' => $lesson, 'task_types' => $task_types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid_task = request()->validate([
            'title' => ['required'],
            'lesson_id' => ['required'],
            'task_type_id' => ['required'],
            'deadline' => ['required'],
            'request' => ['required', 'file']
        ]);
        $lesson = Lesson::find($valid_task['lesson_id']);

        //Task Upload
        $name = 'task' . time() . '.' . $request->file('request')->extension();
        $request->file('request')->move(public_path() . '\uploads\tasks\\', $name);
        $valid_task['request'] = $name;
        $valid_task['group_id'] = $lesson->group->id;

        Task::create($valid_task);
        return redirect('lessons/' . $valid_task['lesson_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $task_types = TaskType::get();
        return view('tasks.edit', ['task' => $task, 'task_types' => $task_types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $valid_task = request()->validate([
            'title' => ['required'],
            'lesson_id' => ['required'],
            'task_type_id' => ['required'],
            'deadline' => ['required'],
            'request' => ['required', 'file']
        ]);
        $lesson = Lesson::find($valid_task['lesson_id']);


        //Remove old Task file
        $oldTask = public_path() . '\uploads\tasks\\' . $task->request;
        if (File::exists($oldTask)) File::delete($oldTask);

        //Task Upload
        $name = 'task' . time() . '.' . $request->file('request')->extension();
        $request->file('request')->move(public_path() . '\uploads\tasks\\', $name);
        $valid_task['request'] = $name;
        $valid_task['group_id'] = $lesson->group->id;

        $task->update($valid_task);
        return redirect('tasks/' . $task->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('lessons/' . $task->lesson->id);
    }
}
