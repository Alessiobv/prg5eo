<x-layout title="songs">
    <h1 class="mb-8 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Songs</h1>

    @auth
        <nav class="mb-6 flex flex-wrap items-center gap-2 text-sm">
            <a href="{{ route('songs.index') }}" @class(['rounded-md px-3 py-1.5 font-medium transition', 'bg-amber-500 text-red-950' => $filter === null, 'text-neutral-200 hover:bg-red-900 hover:text-amber-300' => $filter !== null])>
                All
            </a>
            <a href="{{ route('songs.index', ['filter' => 'liked']) }}" @class(['rounded-md px-3 py-1.5 font-medium transition', 'bg-amber-500 text-red-950' => $filter === 'liked', 'text-neutral-200 hover:bg-red-900 hover:text-amber-300' => $filter !== 'liked'])>
                Liked ({{ $likedIds->count() }})
            </a>
            <a href="{{ route('songs.index', ['filter' => 'favorited']) }}" @class(['rounded-md px-3 py-1.5 font-medium transition', 'bg-amber-500 text-red-950' => $filter === 'favorited', 'text-neutral-200 hover:bg-red-900 hover:text-amber-300' => $filter !== 'favorited'])>
                Favorited ({{ $favoriteIds->count() }})
            </a>
        </nav>
    @endauth

    <form method="GET" action="{{ route('songs.index') }}" class="mb-8 flex flex-wrap items-center gap-3 rounded-lg border border-amber-500/20 bg-neutral-900 p-4 shadow-lg shadow-black/40">
        @if($filter)
            <input type="hidden" name="filter" value="{{ $filter }}">
        @endif

        <label for="search" class="text-sm font-medium text-amber-300">Search</label>
            <input type="search" id="search" name="search" value="{{ $search }}" placeholder="Title, Artist, Musical or Album" class="rounded-md border border-neutral-700 bg-neutral-950 px-3 py-1.5 text-sm text-neutral-100 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">

        <label for="artist" class="text-sm font-medium text-amber-300">Artist</label>
        <select id="artist" name="artist" class="rounded-md border border-neutral-700 bg-neutral-950 px-3 py-1.5 text-sm text-neutral-100 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
            <option value="">All Artists</option>
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" @selected($artistId === $artist->id)>
                    {{ $artist->name }}
                </option>
            @endforeach
        </select>

        <label for="album" class="text-sm font-medium text-amber-300">Album</label>
        <select id="album" name="album" class="rounded-md border border-neutral-700 bg-neutral-950 px-3 py-1.5 text-sm text-neutral-100 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
            <option value="">All Albums</option>
            @foreach($albums as $album)
                <option value="{{ $album->id }}" @selected($albumId === $album->id)>
                    {{ $album->title }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="cursor-pointer rounded-md bg-amber-500 px-4 py-1.5 text-sm font-semibold text-red-950 transition hover:bg-amber-400">Filter</button>
        <a href="{{ route('songs.index', array_filter(['filter' => $filter])) }}" class="rounded-md border border-amber-500 px-4 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Reset</a>
    </form>

    @error('favorite') <p class="mb-6 rounded-md border border-red-500/40 bg-red-950/60 px-4 py-3 text-red-300">{{ $message }}</p> @enderror

    @auth
        <a href="{{ route('songs.create') }}" class="mb-8 inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-red-950 transition hover:bg-amber-400">Add Song</a>
    @endauth

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($songs as $song)
            <div class="flex flex-col rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <h2 class="mb-2 text-xl font-semibold text-amber-300">{{$song->title}}</h2>
                <p class="text-neutral-300">Duration: {{ intdiv($song->duration_sec, 60) }}:{{ str_pad($song->duration_sec % 60, 2, '0', STR_PAD_LEFT) }}</p>
                <p class="text-neutral-300">Musical: {{ $song->musical->musical_name }}</p>
                <p class="text-neutral-300">Artist: {{ $song->artist->name }}</p>
                <p class="grow text-neutral-300">Album: {{ $song->album?->title ?? '-' }}</p>

                @auth
                    <div class="mt-6 flex flex-col gap-3 border-t border-neutral-800 pt-4">
                        @if (auth()->user()->canManage($song))
                        <div class="flex items-center gap-3">
                            <a href="{{ route('songs.edit', $song) }}" class="rounded-md border border-amber-500 px-3 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Edit</a>
                            <form method="POST" action="{{ route('songs.delete', $song) }}/">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cursor-pointer rounded-md bg-red-700 px-3 py-1.5 text-sm text-white transition hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                        @endif

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
        @empty
            <p class="col-span-full py-12 text-center text-neutral-400">No songs match your filters.</p>
        @endforelse
    </div>
</x-layout>
