<?php

namespace App\Http\Controllers;

use App\Models\Perspective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerspectiveController extends Controller
{
    public function index()
    {
        return view('perspectives.index', ['perspectives' => Perspective::get()]);
    }

    public function show(Perspective $perspective)
    {
        // dd($perspective -> groups);
        return view('perspectives.show', ['perspective' => $perspective]);
    }

    public function create()
    {
        return view('perspectives.create');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);

        $perspective = Perspective::create([
            'name' => request('name'),
            'creator_id' => Auth::user()->id
        ]);
        return redirect('perspectives/' . $perspective->id);
    }

    public function edit(Perspective $perspective)
    {
        return view('perspectives.edit', ['perspective' => $perspective]);
    }

    public function update(Perspective $perspective)
    {
        request()->validate([
            'name' => ['required']
        ]);

        $perspective->update([
            'name' => request('name'),
            'creator_id' => Auth::user()->id
        ]);
        return redirect('perspectives/' . $perspective->id);
    }
}
