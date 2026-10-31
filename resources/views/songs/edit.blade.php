<x-layout title="Edit Song">
    <h1>Edit Song</h1>

    <form method="POST" action="{{ route('songs.update', $song) }}/">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $song->title) }}">
        @error('title') <p>{{ $message }}</p> @enderror

        <label for="duration_sec">Duration (Seconds)</label>
        <input type="number" id="duration_sec" name="duration_sec" min="1" value="{{ old('duration_sec', $song->duration_sec) }}">
        @error('duration_sec') <p>{{ $message }}</p> @enderror

        <label for="musical_id">Musical</label>
        <select id="musical_id" name="musical_id">
            @foreach($musicals as $musical)
                <option value="{{ $musical->id }}" @selected(old('musical_id', $song->musical_id) == $musical->id)>
                    {{ $musical->musical_name }}
                </option>
            @endforeach
        </select>
        @error('musical_id') <p>{{ $message }}</p> @enderror

        <label for="artist_id">Artist</label>
        <select id="artist_id" name="artist_id">
            @foreach($artists as $artist)
                <option value="{{ $artist->id }}" @selected(old('artist_id', $song->artist_id) == $artist->id)>
                    {{ $artist->name }}
                </option>
            @endforeach
        </select>
        @error('artist_id') <p>{{ $message }}</p> @enderror

        <label for="album_id">Album</label>
        <select id="album_id" name="album_id">
            @foreach($albums as $album)
                <option value="{{ $album->id }}" @selected(old('album_id', $song->album_id) == $album->id)>
                    {{ $album->title }}
                </option>
            @endforeach
        </select>
        @error('album_id') <p>{{ $message }}</p> @enderror

        <button type="submit">Save</button>
    </form>
</x-layout>
