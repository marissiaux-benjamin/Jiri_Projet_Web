<x-layouts.main>

    <h1 class="font-bold text-white text-5xl mb-10 ml-auto mr-auto">{{ $jiri->name }}</h1>
    <dl class="flex gap-20 justify-around bg-sky-800 p-4 rounded w-fit ml-auto mr-auto">
        <div>
            <dt class="font-bold text-white">{{  __('Name of the jiri') }}</dt>
            <dd class="text-white">{{ $jiri->name }}</dd>
        </div>
        <div>
            <dt class="font-bold text-white">{{  __('Date and time of the jiri') }}</dt>
            <dd class="text-white">{{ $jiri->starting_at->diffForHumans() }}
            </dd>
            <dd class="text-white">
                <time
                    datetime="{{  $jiri->starting_at->toDateTimeString() }}">{{  __('on') }} {{  $jiri->starting_at->format('d M Y') }} {{  __('at') }} {{ $jiri->starting_at->format('H:i') }}
                </time>
            </dd>
        </div>
    </dl>

    <div class="flex gap-5 justify-between ml-auto mr-auto">

        <a href="/jiris/{{ $jiri->id }}/edit"
           class="bg-lime-400 font-bold text-sky-950 rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
            {{  __('Modify this Jiri') }}</a>

        <form method="POST" action="{{ route('jiri.destroy', $jiri) }}">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="bg-red-600 font-bold text-white rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                {{ __('Delete this jiri') }}
            </button>
        </form>
    </div>


</x-layouts.main>
