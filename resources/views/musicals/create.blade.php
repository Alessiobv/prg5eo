<h1>Create musical</h1>

@if (session('success'))
    <p>{{session('success')}}</p>
@endif

<form action="{{ route('musicals.store') }}/" method="POST">
    @csrf

    <div>
        <label for="musical_name">Name</label>
        <input type="text" id="musical_name" name="musical_name" value="{{old('musical_name')}}">
        @error('musical_name')
        <div>{{ $message }}</div> @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">{{old('description')}}</textarea>
        @error('description')
        <div>{{ $message }}</div> @enderror
    </div>

    <button type="submit">Save</button>
</form>
