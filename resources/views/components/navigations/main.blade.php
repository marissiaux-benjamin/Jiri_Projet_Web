<nav id="main-menu"
     class="font-bold">
    <h2 class="sr-only">{{ $title }}</h2>
    <ul class="flex flex-col sm:flex-row gap-4 sm:gap-8 sm:items-center">

        @foreach($links as $link)
            <li class="underline text-sky-900 uppercase tracking-wider">
                <a href="{{ $link['url'] }}">
                    {{ __($link['name']) }}
                </a>
            </li>
        @endforeach

    </ul>
</nav>
