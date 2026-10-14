<x-layout title="Musicals">
    <h1>Musicals</h1>

    <a href="{{ route('musicals.create') }}">Add musical</a>

    @if ($musicals->isEmpty())
        <p>No musicals yet.</p>
    @else
        <ul>
            @foreach ($musicals as $musical)
                <li>
                    <strong>{{ $musical->musical_name }}</strong>: {{ $musical->description }}
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
