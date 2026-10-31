<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Musical;
use Illuminate\Http\Request;

class AlbumsController
{
    public function index()
    {
        $albums = Album::with('musical', 'artist')->get();
        return view('albums.index', compact('albums'));
    }
    public function create()
    {
        $musicals = Musical::all();
        $artists = Artist::all();
        return view('albums.create', compact('musicals', 'artists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
         'title' => 'required|string|max:255',
         'musical_id' => 'required|integer|exists:musicals,id',
         'artist_id' => 'required|integer|exists:artists,id',
        ]);

        Album::query()->create($validated);

        return redirect()->route('albums.index');
    }

    public function edit(Album $album)
    {
        $musicals = Musical::all();
        $artists = Artist::all();
        return view('albums.edit', compact('album', 'musicals', 'artists'));
    }

    public function update(Album $album, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'musical_id' => 'required|integer|exists:musicals,id',
            'artist_id' => 'required|integer|exists:artists,id',
        ]);

        $album->update([$validated]);

        return redirect()->route('albums.index');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('albums.index');
    }
}
