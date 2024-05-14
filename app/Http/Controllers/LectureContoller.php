<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LectureContoller extends Controller
{
    public function create(Request $request)
    {
        // dd($request['lesson']);
        // $group = Group::find($request['group']);
        // $response = Gate::inspect('edit', $group);
        // if (!$response->allowed()) abort(403, $response->message());
        return view('lectures.create', ['lesson_id' => $request['lesson']]);
    }

    public function store()
    {
        $valid_lecture = request()->validate([
            'name' => ['required'],
            'lesson_id' => ['required'],
            'material' => ['required', 'file', 'mimes:pdf']
        ]);

        //Image Upload
        $material = request('material');
        $material_name = $material->getClientOriginalName();
        $material_arr = $material->getPathname();
        $uploads = Paths::filePaths(['uploads'], [Paths::filePaths(['lecture'], [$valid_lecture['lesson_id']])[0]])[0];
        $rand = rand(100000, 999999);
        if (!File::exists(Paths::filePaths([public_path()], [$uploads])[0]))
            File::makeDirectory(Paths::filePaths([public_path()], [$uploads])[0], 0777, true);
        move_uploaded_file($material_arr, Paths::filePaths([$uploads], [$rand . '-' . $material_name])[0]);
        $material = Paths::filePaths([request()->getSchemeAndHttpHost()], [Paths::filePaths([$uploads], [$rand . '-' . $material_name])[0]])[0];


        $lecture = Lecture::create([
            'name' => request('name'),
            'lesson_id' => request('lesson_id'),
            'material' => $material
        ]);
        return redirect('lessons/' . $valid_lecture['lesson_id']);
    }
}
