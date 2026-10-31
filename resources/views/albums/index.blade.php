<x-layout title="Albums">
    <h1>Albums</h1>

    @auth
        <a href="{{ route('albums.create') }}" class="btn">Add Album</a>
    @endauth

    @foreach ($albums as $album)
        <div class="card">
            <h2>{{ $album->title }}</h2>
            <p>Musical: {{ $album->musical->musical_name }}</p>
            <p>Artist: {{ $album->artist->name }}</p>

            @auth
                <a href="{{ route('albums.edit', $album) }}">Edit</a>
                <form method="POST" action="{{ route('albums.delete', $album) }}/">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endauth
        </div>
    @endforeach
</x-layout>
