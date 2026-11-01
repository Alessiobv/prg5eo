<x-layout title="Edit Musical">
    <h1 class="mb-8 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Edit Musical</h1>

    <form action="{{ route('musicals.update', $musical) }}/" method="POST" class="mx-auto flex max-w-xl flex-col gap-2 rounded-lg border border-amber-500/20 bg-neutral-900 p-8 shadow-lg shadow-black/40">
        @csrf
        @method('PUT')

        <label for="musical_name" class="mt-4 block text-sm font-medium text-amber-300 first:mt-0">Musical Title</label>
        <input type="text" id="musical_name" name="musical_name"
               value="{{ old('musical_name', $musical->musical_name) }}"
               class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
        @error('musical_name')
        <div class="text-sm text-red-400">{{ $message }}</div>
        @enderror

        <label for="description" class="mt-4 block text-sm font-medium text-amber-300">Description</label>
        <textarea id="description" name="description"
                  rows="5"
                  class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">{{ old('description', $musical->description) }}</textarea>
        @error('description')
        <div class="text-sm text-red-400">{{ $message }}</div>
        @enderror

        <div class="mt-6 flex items-center gap-3">
            <button type="submit" class="cursor-pointer rounded-md bg-amber-500 px-6 py-2 font-semibold text-red-950 transition hover:bg-amber-400">Save</button>
            <a href="{{ route('musicals.index') }}" class="rounded-md border border-amber-500 px-6 py-2 text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Cancel</a>
        </div>
    </form>
</x-layout>
