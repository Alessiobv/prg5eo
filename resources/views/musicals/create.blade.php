<x-layout title="Create musical">
    <h1 class="mb-8 border-b border-amber-500/30 pb-4 text-3xl font-bold tracking-wide text-amber-400">Create musical</h1>

    @if (session('success'))
        <p class="mb-6 rounded-md border border-emerald-500/40 bg-emerald-950/60 px-4 py-3 text-emerald-300">{{session('success')}}</p>
    @endif

    <form action="{{ route('musicals.store') }}/" method="POST" class="mx-auto max-w-xl space-y-6 rounded-lg border border-amber-500/20 bg-neutral-900 p-8 shadow-lg shadow-black/40">
        @csrf

        <div>
            <label for="musical_name" class="mb-2 block text-sm font-medium text-amber-300">Name</label>
            <input type="text" id="musical_name" name="musical_name" value="{{old('musical_name')}}" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">
            @error('musical_name')
            <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description" class="mb-2 block text-sm font-medium text-amber-300">Description</label>
            <textarea id="description" name="description" rows="5" class="w-full rounded-md border border-neutral-700 bg-neutral-950 px-4 py-2 text-neutral-100 placeholder-neutral-500 transition focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500">{{old('description')}}</textarea>
            @error('description')
            <div class="mt-2 text-sm text-red-400">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="cursor-pointer rounded-md bg-amber-500 px-6 py-2 font-semibold text-red-950 transition hover:bg-amber-400">Save</button>
    </form>
</x-layout>
