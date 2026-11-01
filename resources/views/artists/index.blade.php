<x-layout title="Artists">
    <h1 class="mb-8 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Artists</h1>

    @can('admin')
        <a href="{{ route('artists.create') }}" class="mb-8 inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-red-950 transition hover:bg-amber-400">Add Artists</a>
    @endcan

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($artists as $artist)
            <div class="flex flex-col rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                <h2 class="mb-2 text-xl font-semibold text-amber-300">{{ $artist->name }}</h2>
                <p class="grow text-neutral-300">Musical: {{ $artist->musical->musical_name }}</p>

                @can('admin')
                    <div class="mt-6 flex items-center gap-3 border-t border-neutral-800 pt-4">
                        <a href="{{ route('artists.edit', $artist) }}" class="rounded-md border border-amber-500 px-3 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Edit</a>
                        <form method="POST" action="{{ route('artists.delete', $artist) }}/">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="cursor-pointer rounded-md bg-red-700 px-3 py-1.5 text-sm text-white transition hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                @endcan
            </div>
        @empty
            <p class="col-span-full py-12 text-center text-neutral-400">No artists yet.</p>
        @endforelse
    </div>
</x-layout>
