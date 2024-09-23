<x-layouts.main>

    <h1 class="font-bold text-white text-5xl mb-10 ml-auto mr-auto">{{ $jiri->name }}</h1>
    <dl class="flex gap-20 justify-center bg-sky-800 p-4 rounded w-fit ml-auto mr-auto">
        <div>
            <dt class="font-bold text-white">{{  __('Name of the jiri') }}</dt>
            <dd class="text-white">{{ $jiri->name }}</dd>
        </div>
        <div>
            <dt class="font-bold text-white">{{  __('Date and time of the jiri') }}</dt>
            <dd class="text-white">{{ $jiri->starting_at->diffForHumans() }}
            </dd>
            <dd class="text-white">
                <time datetime="{{  $jiri->starting_at->toDateTimeString() }}">{{  __('on') }} {{  $jiri->starting_at->format('d M Y') }} {{  __('at') }} {{ $jiri->starting_at->format('H:i') }}
                </time>
            </dd>
        </div>
    </dl>

</x-layouts.main>
