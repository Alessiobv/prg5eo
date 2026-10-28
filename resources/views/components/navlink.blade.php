@props(['link', 'action' => false])

<a href="{{$link}}" class="{{ $action ? 'active' : '' }}">{{$slot}}</a>
