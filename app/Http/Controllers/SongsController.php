<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function index()
    {
        $songs = Song::latest()->get();

        return view('songs', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration_sec' => 'required|integer',
        ]);

        Song::query()->create($validated);

        return redirect()->route('songs.songs');
    }

    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration_sec' => 'required|integer',
        ]);
        $song->update($validated);

        return redirect()->route('songs.songs')->with('success', 'Song Updated');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.songs')->with('success', 'Song Deleted');
    }
}
