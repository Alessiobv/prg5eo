<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Musical;
use Illuminate\Http\Request;
use App\Models\User;

class SongsController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $likedIds = $user ? $user->likedSongs()->pluck('songs.id') : collect();
        $favoriteIds = $user ? $user->favoriteSongs()->pluck('songs.id') : collect();
        $artistId = $request->integer('artist') ?: null;
        $albumId = $request->integer('album') ?: null;

        $filter = $request->query('filter');
        if (! $user || ! in_array($filter, ['liked', 'favorited'], true)) {
            $filter = null;
        }

        $songs = Song::with(['musical', 'artist', 'album'])
            ->when($filter === 'liked', fn ($query) => $query->whereIn('songs.id', $likedIds))
            ->when($filter === 'favorited', fn ($query) => $query->whereIn('songs.id', $favoriteIds))
            ->when($artistId, fn ($query) => $query->where('songs.artist_id', $artistId))
            ->when($albumId, fn ($query) => $query->where('songs.album_id', $albumId))
            ->get();

        return view('songs.index', [
            'songs' => $songs,
            'filter' => $filter,
            'likedIds' => $likedIds,
            'favoriteIds' => $favoriteIds,
            'artistId' => $artistId,
            'albumId' => $albumId,
            'artists' => Artist::orderBy('name')->get(),
            'albums' => Album::orderBy('title')->get(),
        ]);
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
            'album_id' => 'nullable|integer|exists:albums,id',
            'artist_id' => 'required|integer|exists:artists,id',
        ]);

        $validated['user_id'] = $request->user()->id;

        Song::query()->create($validated);

        return redirect()->route('songs.index');
    }

    public function edit(Song $song)
    {
        abort_unless(auth()->user()->canManage($song), 403);

        return view('songs.edit', [
            'song' => $song,
            'musicals' => Musical::all(),
            'artists' => Artist::all(),
            'albums' => Album::all(),
        ]);
    }

    public function update(Request $request, Song $song)
    {
        abort_unless(auth()->user()->canManage($song), 403);

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
        abort_unless(auth()->user()->canManage($song), 403);

        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song Deleted');
    }

    public function like(Song $song, Request $request)
    {
        $request->user()->likedSongs()->toggle($song->id);

        return back();
    }

    public function favorite(Song $song, Request $request)
    {
        $user = $request->user();

        if ($user->favoriteSongs()->where('songs.id', $song->id)->exists()) {
            $user->favoriteSongs()->detach($song->id);
            return back();
        }

        if(! $user->canFavorite()){
            return back()->withErrors([
                'favorite' => 'Like ' . User::LIKES_NEEDED_TO_FAVORITE . ' songs before you can favorite songs.',
            ]);
        }

        $user->favoriteSongs()->attach($song->id);

        return back();
    }
}
