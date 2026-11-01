@props([
    'title' => 'Title'
])
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-neutral-950 text-neutral-100 antialiased">
<header class="bg-red-950 border-b border-amber-500/40 shadow-lg shadow-black/40">
    <nav class="max-w-6xl mx-auto flex flex-wrap items-center justify-between gap-4 px-6 py-4">
        <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide text-amber-400 hover:text-amber-300 transition">MusicAll Charts</a>

        <div class="flex flex-wrap items-center gap-2 text-sm">
            <x-navlink link="{{route('home')}}" :action="request()->routeIs('home')">Home</x-navlink>
            <x-navlink link="{{route('about')}}" :action="request()->routeIs('about')">About</x-navlink>
            <x-navlink link="{{route('contact')}}" :action="request()->routeIs('contact')">Contact</x-navlink>
            <x-navlink link="{{route('musicals.index')}}" :action="request()->routeIs('musicals.*')">Musicals
            </x-navlink>
            <x-navlink link="{{route('artists.index')}}" :action="request()->routeIs('artists.*')">Artists</x-navlink>
            <x-navlink link="{{route('albums.index')}}" :action="request()->routeIs('albums.*')">Albums</x-navlink>
            <x-navlink link="{{route('songs.index')}}" :action="request()->routeIs('songs')">Songs</x-navlink>

            @auth
                <x-navlink link="{{route('dashboard')}}" :action="request()->routeIs('dashboard')">Dashboard</x-navlink>
                <form method="POST" action="{{ route('logout') }}/">
                    @csrf
                    <button type="submit" class="cursor-pointer rounded-md border border-amber-500 px-3 py-1.5 text-amber-400 transition hover:bg-amber-500 hover:text-red-950">Logout</button>
                </form>
            @else
                <x-navlink link="{{route('login')}}" :action="request()->routeIs('login')">Login</x-navlink>
                <x-navlink link="{{route('register')}}" :action="request()->routeIs('register')">Register</x-navlink>
            @endauth
        </div>
    </nav>
</header>
<main class="max-w-6xl mx-auto px-6 py-10">
    {{$slot}}
</main>
</body>
</html>
