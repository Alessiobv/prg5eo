<?php

namespace App\Http\Controllers;

use App\Models\Musical;
use Illuminate\Http\Request;

class MusicalsController extends Controller
{
    public function index()
    {
        $musicals = Musical::latest()->get();

        return view('musicals.index', compact('musicals'));
    }

    public function create()
    {
        return view('musicals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'musical_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Musical::query()->create($validated);

        return redirect()->route('musicals.index');
    }

    public function edit(Musical $musical)
    {
        return view('musicals.edit', compact('musical'));
    }

    public function update(Request $request, Musical $musical)
    {
        $validated = $request->validate([
            'musical_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        $musical->update($validated);

        return redirect()->route('musicals.index')->with('success', 'Musical Updated');
    }

    public function destroy(Musical $musical)
    {
        $musical->delete();

        return redirect()->route('musicals.index')->with('success', 'Musical Deleted');
    }
}
