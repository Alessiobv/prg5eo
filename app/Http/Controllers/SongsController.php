<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Musical;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function index()
    {
        $songs = Song::all();

        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create', [
            'musicals' => Musical::all(),
            'artists' => Artist::all(),
            'albums' => Album::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration_sec' => 'required|integer',
            'musical_id' => 'required|integer|exists:musicals,id',
            'album_id' => 'required|integer|exists:albums,id',
            'artist_id' => 'required|integer|exists:artists,id',
        ]);

        Song::query()->create($validated);

        return redirect()->route('songs.index');
    }

    public function edit(Song $song)
    {
        return view('songs.edit', [
            'song' => $song,
            'musicals' => Musical::all(),
            'artists' => Artist::all(),
            'albums' => Album::all(),
        ]);
    }

    public function update(Request $request, Song $song)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration_sec' => 'required|integer',
            'musical_id' => 'required|integer|exists:musicals,id',
            'album_id' => 'required|integer|exists:albums,id',
            'artist_id' => 'required|integer|exists:artists,id',
        ]);
        $song->update($validated);

        return redirect()->route('songs.index')->with('success', 'Song Updated');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song Deleted');
    }
}
