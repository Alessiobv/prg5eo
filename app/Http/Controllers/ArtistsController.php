<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Musical;
use Illuminate\Http\Request;

class ArtistsController
{
    public function index()
    {
        $artists = Artist::with('musical')->get();
        return view('artists.index', compact('artists'));
    }
    public function create()
    {
        $musicals = Musical::all();
        return view('artists.create', compact('musicals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'musical_id' => 'required|integer|exists:musicals,id',
        ]);

        Artist::query()->create($validated);

        return redirect()->route('artists.index');
    }

    public function edit(Artist $artist)
    {
        $musicals = Musical::all();
        return view('artists.edit', compact('artist', 'musicals'));
    }

    public function update(Artist $artist, Request $request)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'musical_id' => 'required|integer|exists:musicals,id',
        ]);
        $artist->update($validated);

        return redirect()->route('artists.index');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('artists.index');
    }
}
