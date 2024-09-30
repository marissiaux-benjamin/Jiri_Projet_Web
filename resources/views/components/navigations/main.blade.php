<nav id="main-menu"
     class="font-bold">
    <h2 class="sr-only">{{ $title }}</h2>
    <ul class="flex flex-col sm:flex-row gap-4 sm:gap-8 sm:items-center">
        @auth
            @foreach($links as $link)
                <li class="underline text-sky-900 uppercase tracking-wider">
                    <a href="{{ $link['url'] }}">
                        {{ __($link['name']) }}
                    </a>
                </li>
            @endforeach

            @if(Route::has('logout'))
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="underline uppercase tracking-wider text-sky-900">
                            {!!  __('logout') !!}
                        </button>
                    </form>
                </li>
            @endif

            @if(Route::has('profile'))
                <li>
                    <a href="{{ route('profile') }}">{!! __('login') !!}
                    </a>
                </li>
            @endif
        @elseauth
            @if(Route::has('login'))

                <li>
                    <a href="{{ route('profile') }}">
                        {!! __('login') !!}
                    </a>
                </li>
            @endif
            @if(Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">
                        {!! __('register') !!}
                    </a>
                </li>
            @endif
        @endauth
    </ul>
</nav>
