<x-layout title="Musicals">
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4 border-b border-amber-500/30 pb-4">
        <h1 class="text-3xl font-bold tracking-wide text-amber-400">Musicals</h1>

        @can('admin')
            <a href="{{ route('musicals.create') }}" class="rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-red-950 transition hover:bg-amber-400">Add musical</a>
        @endcan
    </div>

    @if (session('success'))
        <p class="mb-6 rounded-md border border-emerald-500/40 bg-emerald-950/60 px-4 py-3 text-emerald-300">{{ session('success') }}</p>
    @endif

    @if ($musicals->isEmpty())
        <p class="py-12 text-center text-neutral-400">No musicals yet.</p>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($musicals as $musical)
                <div class="flex flex-col rounded-lg border border-amber-500/20 bg-neutral-900 p-6 shadow-lg shadow-black/40 transition hover:border-amber-500/60">
                    <h2 class="mb-2 text-xl font-semibold text-amber-300">{{ $musical->musical_name }}</h2>
                    <p class="grow text-neutral-300">{{ $musical->description }}</p>

                    @can('admin')
                        <div class="mt-6 flex items-center gap-3 border-t border-neutral-800 pt-4">
                            <a href="{{route('musicals.edit', $musical) }}" class="rounded-md border border-amber-500 px-3 py-1.5 text-sm text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Edit</a>

                            <form action="{{route('musicals.delete', $musical) }}/" method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cursor-pointer rounded-md bg-red-700 px-3 py-1.5 text-sm text-white transition hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    @endcan
                </div>
            @empty
                <p class="col-span-full py-12 text-center text-neutral-400">No musicals yet.</p>
            @endforelse
        </div>
    @endif
</x-layout>
