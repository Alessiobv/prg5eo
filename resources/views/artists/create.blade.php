<x-layout title="Add Artist">
    <h1>Add Artist</h1>

    <form method="POST" action="{{ route('artists.store') }}/">
        @csrf

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        @error('name') <p>{{ $message }}</p> @enderror

        <label for="musical_id">Musical</label>
        <select id="musical_id" name="musical_id">
            @foreach ($musicals as $musical)
                <option value="{{ $musical->id }}" @selected(old('musical_id') == $musical->id)>
                    {{ $musical->musical_name }}
                </option>
            @endforeach
        </select>
        @error('musical_id') <p>{{ $message }}</p> @enderror

        <button type="submit">Save</button>
    </form>
</x-layout>
