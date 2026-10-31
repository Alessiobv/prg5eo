<x-layout title="Edit Album">
    <h1>Edit Album</h1>

    <form method="POST" action="{{ route('albums.update', $album) }}/">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $album->title) }}">
        @error('title') <p>{{ $message }}</p> @enderror

        <label for="musical_id">Musical</label>
        <select id="musical_id" name="musical_id">
            @foreach ($musicals as $musical)
                <option value="{{ $musical->id }}" @selected(old('musical_id', $album->musical_id) == $musical->id)>
                    {{ $musical->musical_name }}
                </option>
            @endforeach
        </select>
        @error('musical_id') <p>{{ $message }}</p> @enderror

        <label for="artist_id">Artist</label>
        <select id="artist_id" name="artist_id">
            @foreach ($artists as $artist)
                <option value="{{ $artist->id }}" @selected(old('artist_id', $album->artist_id) == $artist->id)>
                    {{ $artist->name }}
                </option>
            @endforeach
        </select>
        @error('artist_id') <p>{{ $message }}</p> @enderror

        <button type="submit">Save</button>
    </form>
</x-layout>
