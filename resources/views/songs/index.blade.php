<x-layout title="songs">
    <h1>Songs</h1>

    @auth
        <a href="{{ route('songs.create') }}" class="btn">Add Song</a>
    @endauth

    @foreach($songs as $song)
        <div class="card">
            <h2>{{$song->title}}</h2>
            <p>Duration: {{ intdiv($song->duration_sec, 60) }}:{{ str_pad($song->duration_sec % 60, 2, '0', STR_PAD_LEFT) }}</p>
            <p>Musical: {{ $song->musical->musical_name }}</p>
            <p>Artist: {{ $song->artist->name }}</p>
            <p>Album: {{ $song->album?->title ?? '-' }}</p>

            @auth
                <a href="{{ route('songs.edit', $song) }}">Edit</a>
                <form method="POST" action="{{ route('songs.delete', $song) }}/">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endauth
        </div>
    @endforeach
</x-layout>
