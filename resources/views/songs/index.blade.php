<x-layout title="songs">
    <h1 class="mb-8 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Songs</h1>

    @error('favorite') <p class="mb-6 rounded-md border border-red-500/40 bg-red-950/60 px-4 py-3 text-red-300">{{ $message }}</p> @enderror

    @auth
        <a href="{{ route('songs.create') }}" class="mb-8 inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-red-950 transition hover:bg-amber-400">Add Song</a>
    @endauth

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($songs as $song)
            <div class="flex flex-col rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <h2 class="mb-2 text-xl font-semibold text-amber-300">{{$song->title}}</h2>
                <p class="text-neutral-300">Duration: {{ intdiv($song->duration_sec, 60) }}:{{ str_pad($song->duration_sec % 60, 2, '0', STR_PAD_LEFT) }}</p>
                <p class="text-neutral-300">Musical: {{ $song->musical->musical_name }}</p>
                <p class="text-neutral-300">Artist: {{ $song->artist->name }}</p>
                <p class="grow text-neutral-300">Album: {{ $song->album?->title ?? '-' }}</p>

                @auth
                    <div class="mt-6 flex flex-col gap-3 border-t border-neutral-800 pt-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('songs.edit', $song) }}" class="rounded-md border border-amber-500 px-3 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Edit</a>
                            <form method="POST" action="{{ route('songs.delete', $song) }}/">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cursor-pointer rounded-md bg-red-700 px-3 py-1.5 text-sm text-white transition hover:bg-red-600">Delete</button>
                            </form>
                        </div>

                        <div class="flex flex-wrap items-center gap-3">
                            <form method="POST" action="{{ route('songs.like', $song) }}/">
                                @csrf
                                <button type="submit" class="cursor-pointer rounded-md border border-amber-500 px-3 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">{{ $likedIds->contains($song->id) ? 'Unlike' : 'Like' }}</button>
                            </form>

                            @if (auth()->user()->canFavorite() || $favoriteIds->contains($song->id))
                                <form method="POST" action="{{ route('songs.favorite', $song) }}/">
                                    @csrf
                                    <button type="submit" class="cursor-pointer rounded-md border border-amber-500 px-3 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">{{ $favoriteIds->contains($song->id) ? 'Unfavorite' : 'Favorite' }}</button>
                                </form>
                            @else
                                <p class="w-full text-xs text-neutral-400">Like {{ \App\Models\User::LIKES_NEEDED_TO_FAVORITE - auth()->user()->likedSongs()->count() }} more songs to unlock favorites</p>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>
        @endforeach
    </div>
</x-layout>
