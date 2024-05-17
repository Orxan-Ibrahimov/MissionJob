<?php

namespace App\Http\Controllers;

use App\Models\Perspective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        $response = Gate::inspect('create', Auth::user());
        if (!$response->allowed()) abort(403, $response->message());

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
        $response = Gate::inspect('edit', $perspective);
        if (!$response->allowed()) abort(403, $response->message());

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
