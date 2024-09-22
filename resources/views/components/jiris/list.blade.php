@props(['jiris'])

<ol>
    @foreach($jiris as $jiri)
        <li class="mb-2"><a href="/jiris/{{ $jiri->id }}" class="underline text-white hover:text-lime-300 duration-200">{{ $jiri->name }}</a></li>
    @endforeach
</ol>
