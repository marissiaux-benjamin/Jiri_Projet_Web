@props(["color","text","text_color","ml"])

<button type="submit"
        class="{{$color}} {{$text_color}} {{ $ml }}  font-bold rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
    {{$text}}
</button>
