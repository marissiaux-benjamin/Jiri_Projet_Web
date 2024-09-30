@props(["color","text","text_color","url_route"])

<a href="{{ $url_route }}"
   class="{{$color}} ml-auto mr-auto font-bold {{ $text_color }} rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
    {{ $text }}
</a>

