@props(["color","text","text_color"])

<button type="submit"
        class="{{$color}} {{$text_color}} font-bold rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
    {{$text}}
</button>
