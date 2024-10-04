<x-layouts.main>

    <h1 class="font-bold text-white text-5xl mb-10 ml-auto mr-auto">{{ $jiri->name }}</h1>
    <dl class="flex gap-20 justify-between bg-sky-800 p-4 rounded ml-auto mr-auto">
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
        @can('update',$jiri)

            <a href="/jiris/{{ $jiri->id }}/edit"
               class="bg-lime-400 font-bold text-sky-950 rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
                {{  __('Modify this Jiri') }}</a>
        @endcan
        @can('delete',$jiri)
            <form method="POST" action="{{ route('jiri.destroy', $jiri) }}">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="bg-red-600 font-bold text-white rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                    {{ __('Delete this jiri') }}
                </button>
            </form>
    </div>
    @endcan
    <div class="flex gap-24 justify-between w-1/2 ml-auto mr-auto">
        <section class="mt-3 mr-auto ml-auto">
            <h1 class="text-white font-bold text-3xl mb-6">Students&nbsp;:</h1>
            <ul>
                @foreach($jiri->students as $student)
                    <li class="text-white">
                        <a href="" title="changer en evaluateur">
                            {{ $student->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
        <section class="mt-3 mr-auto ml-auto">
            <h1 class="text-white font-bold text-3xl mb-6">Evaluators&nbsp;:</h1>
            <ul>
                @foreach($jiri->evaluators as $evaluator)
                    <li class="text-white mb-3">
                        {{ $evaluator->name }}
                        <form action="{{ route('attendance.update', $attendance) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="underline text-white ml-3"
                                    title="changer en evaluateur">
                                Changer en étudiant
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>

</x-layouts.main>
