@props([
    'title' => 'Title'
])
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="header">
    <nav class="nav">
        <a href="{{ route('home') }}" class="nav-logo">MusicAll Charts</a>

        <div class="nav-links">
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
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            @else
                <x-navlink link="{{route('login')}}" :action="request()->routeIs('login')">Login</x-navlink>
                <x-navlink link="{{route('register')}}" :action="request()->routeIs('register')">Register</x-navlink>
            @endauth
        </div>
    </nav>
</header>
<main class="container">
    {{$slot}}
</main>
</body>
</html>
