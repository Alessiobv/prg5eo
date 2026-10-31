<x-layout title="Edit Song">
    <h1>Edit Song</h1>

    <form action="{{ route('songs.update'. $song) }}/" method="POST" class="form">
        @csrf
        @method('PUT')

        <label for="title">Song Title</label>
        <input type="text" id="title" name="title"
               value="{{old('title', $song->title)}}">
        @error('title')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="duration_sec">Song Duration in Seconds</label>
        <input type="number" id="duration_sec" name="duration_sec"
               value="{{old('duration_sec', $song->duration_sec)}}">
        @error('duration_sec')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Save</button>
        <a href="{{route('songs.songs')}}" class="btn btn-secondary">Cancel</a>
    </form>
</x-layout>
