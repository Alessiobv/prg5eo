@props([
    'title' => 'Title'
])
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
</head>
<body>
{{$slot}}
<nav>
    <x-navlink link="{{route('home')}}" :action="request()->routeIs('home')">Home</x-navlink>
    <x-navlink link="{{route('about')}}" :action="request()->routeIs('about')">About</x-navlink>
    <x-navlink link="{{route('contact')}}" :action="request()->routeIs('contact')">Contact</x-navlink>
    <x-navlink link="{{route('musicals')}}" :action="request()->routeIs('musicals')">Musicals</x-navlink>
    <x-navlink link="{{route('songs')}}" :action="request()->routeIs('songs')">Songs</x-navlink>
</nav>
</body>
</html>
