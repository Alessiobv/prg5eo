<x-layout title="Dashboard">
    <h1 class="mb-8 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Dashboard</h1>

    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <h2 class="text-2xl font-semibold text-amber-300">My Songs</h2>

        <a href="{{ route('songs.create') }}" class="inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-red-950 transition hover:bg-amber-400">Add Song</a>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($songs as $song)
            <div class="flex flex-col rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <h3 class="mb-2 text-xl font-semibold text-amber-300">{{ $song->title }}</h3>
                <p class="text-neutral-300">Duration: {{ intdiv($song->duration_sec, 60) }}:{{ str_pad($song->duration_sec % 60, 2, '0', STR_PAD_LEFT) }}</p>
                <p class="text-neutral-300">Musical: {{ $song->musical->musical_name }}</p>
                <p class="text-neutral-300">Artist: {{ $song->artist->name }}</p>
                <p class="grow text-neutral-300">Album: {{ $song->album?->title ?? '-' }}</p>

                <div class="mt-6 flex items-center gap-3 border-t border-neutral-800 pt-4">
                    <a href="{{ route('songs.edit', $song) }}" class="rounded-md border border-amber-500 px-3 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Edit</a>
                    <form method="POST" action="{{ route('songs.delete', $song) }}/">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cursor-pointer rounded-md bg-red-700 px-3 py-1.5 text-sm text-white transition hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="col-span-full py-12 text-center text-neutral-400">You haven't added a song yet.</p>
        @endforelse
    </div>
</x-layout>
