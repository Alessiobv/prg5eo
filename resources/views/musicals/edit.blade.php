<x-layout title="Edit Musical">
    <h1>Edit Musical</h1>

    <form action="{{ route('musicals.update', $musical) }}/" method="POST" class="form">
        @csrf
        @method('PUT')

        <label for="musical_name">Musical Title</label>
        <input type="text" id="musical_name" name="musical_name"
               value="{{ old('musical_name', $musical->musical_name) }}">
        @error('musical_name')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Description</label>
        <textarea id="description" name="description"
                  rows="5">{{ old('description', $musical->description) }}</textarea>
        @error('description')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Save</button>
        <a href="{{ route('musicals.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</x-layout>
