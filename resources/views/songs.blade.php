<x-layout title="Songs">
    <div class="page-header">
        <h1>Songs</h1>

        @auth
            <a href="{{ route('songs.create') }}">Add Song</a>
        @endauth
    </div>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($songs->isEmpty())
        <p>No songs yet.</p>
    @else
        <div class="card-grid">
            @foreach ($songs as $song)
                <div class="card">
                    <h2>{{ $song->title }}</h2>
                    <p>{{ $song->duration_sec }}</p>

                    @auth
                        <div class="card-actions">
                            <a href="{{ route('songs.edit', $song) }}" class="btn btn-secondary">Edit</a>

                            <form action="{{ route('songs.delete', $song) }}/" method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
