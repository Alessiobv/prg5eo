<x-layout title="Create Song">
    <h1>Create Song</h1>

    @if (session('success'))
        <p>{{session('success')}}</p>
    @endif

    <form action="{{ route('songs.store') }}/" method="POST" class="form">
        @csrf

        <div>
            <label for="title">Song Title</label>
            <input type="text" id="title" name="title" value="{{old('title')}}">
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="duration_sec">Song Duration in Seconds</label>
            <input type="number" id="duration_sec" name="duration_sec" value="{{old('duration_sec')}}">
            @error('duration_sec')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="musical_id">Musical</label>

        </div>

        <button type="submit">Save</button>
    </form>
</x-layout>
