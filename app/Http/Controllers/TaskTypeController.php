<?php

namespace App\Http\Controllers;

use App\Models\TaskType;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

class TaskTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasktypes = TaskType::get();
        return view('tasktypes.index', ['tasktypes' => $tasktypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasktypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid_tt =  request()->validate([
            'type' => ['required'],
            'max_point' => ['required'],
        ]);

        TaskType::create($valid_tt);
        return redirect('tasktypes');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskType $tasktype)
    {
        return view('tasktypes.show', ['tasktype' => $tasktype]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskType $tasktype)
    {
        return view('tasktypes.edit', ['tasktype' => $tasktype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskType $tasktype)
    {
        $valid_tt =  request()->validate([
            'type' => ['required'],
            'max_point' => ['required', 'min:0'],
        ]);

        $tasktype->update($valid_tt);
        return redirect('tasktypes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskType $tasktype)
    {
        $tasktype->delete();
        return redirect('tasktypes');
    }
}
