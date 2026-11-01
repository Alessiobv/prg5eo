<x-layout title="Add Album">
    <h1 class="mb-8 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Add Album</h1>

    <form method="POST" action="{{ route('albums.store') }}/" class="mx-auto flex max-w-xl flex-col gap-2 rounded-lg border border-amber-500/20 bg-neutral-900 p-8 shadow-lg shadow-black/40">
        @csrf

        <label for="title" class="block text-sm font-medium text-amber-300">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
        @error('title') <p class="text-sm text-red-400">{{ $message }}</p> @enderror

        <label for="musical_id" class="mt-4 block text-sm font-medium text-amber-300">Musical</label>
        <select id="musical_id" name="musical_id" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
            @foreach ($musicals as $musical)
                <option value="{{ $musical->id }}" @selected(old('musical_id') == $musical->id)>
                    {{ $musical->musical_name }}
                </option>
            @endforeach
        </select>
        @error('musical_id') <p class="text-sm text-red-400">{{ $message }}</p> @enderror

        <label for="artist_id" class="mt-4 block text-sm font-medium text-amber-300">Artist</label>
        <select id="artist_id" name="artist_id" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
            @foreach ($artists as $artist)
                <option value="{{ $artist->id }}" @selected(old('artist_id') == $artist->id)>
                    {{ $artist->name }}
                </option>
            @endforeach
        </select>
        @error('artist_id') <p class="text-sm text-red-400">{{ $message }}</p> @enderror

        <button type="submit" class="mt-6 cursor-pointer self-start rounded-md bg-amber-500 px-6 py-2 font-semibold text-red-950 transition hover:bg-amber-400">Save</button>
    </form>
</x-layout>
