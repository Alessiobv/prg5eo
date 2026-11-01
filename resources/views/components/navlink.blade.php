@props(['link', 'action' => false])

<a href="{{$link}}" class="rounded-md px-3 py-1.5 font-medium transition {{ $action ? 'bg-amber-500 text-red-950' : 'text-neutral-200 hover:bg-red-900 hover:text-amber-300' }}">{{$slot}}</a>
