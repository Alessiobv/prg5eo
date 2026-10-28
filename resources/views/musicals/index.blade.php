<x-layout title="Musicals">
    <div class="page-header">
        <h1>Musicals</h1>

        @auth
            <a href="{{ route('musicals.create') }}">Add musical</a>
        @endauth
    </div>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($musicals->isEmpty())
        <p>No musicals yet.</p>
    @else
        <div class="card-grid">
            @foreach ($musicals as $musical)
                <div class="card">
                    <h2>{{ $musical->musical_name }}</h2>
                    <p>{{ $musical->description }}</p>

                    @auth
                        <div class="card-actions">
                            <a href="{{route('musicals.edit', $musical) }}" class="btn btn-secondary">Edit</a>

                            <form action="{{route('musicals.delete', $musical) }}/" method="POST"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
