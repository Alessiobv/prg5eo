<x-layout title="Artists">
    <h1>Artists</h1>

    @auth
        <a href="{{ route('artists.create') }}" class="btn">Add Artists</a>
    @endauth

    @foreach ($artists as $artist)
        <div class="card">
            <h2>{{ $artist->name }}</h2>
            <p>Musical: {{ $artist->musical->musical_name }}</p>

            @auth
                <a href="{{ route('artists.edit', $artist) }}">Edit</a>
                <form method="POST" action="{{ route('artists.delete', $artist) }}/">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endauth
        </div>
    @endforeach
</x-layout>
