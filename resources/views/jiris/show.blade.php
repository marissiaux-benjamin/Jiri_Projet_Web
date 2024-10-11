<x-layouts.main>

    <h1 class="font-bold text-white text-7xl mt-7 mb-10 ml-auto mr-auto">{{ $jiri->name }}</h1>
    <dl class="flex gap-20 w-1/2 justify-around bg-sky-800 p-4 rounded ml-auto mr-auto">
        <div>
            <dt class="text-4xl font-bold text-white">{{  __('Name of the jiri') }}</dt>
            <dd class="text-white">{{ $jiri->name }}</dd>
        </div>
        <div>
            <dt class="text-4xl font-bold text-white">{{  __('Date and time of the jiri') }}</dt>
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
                        class=" bg-red-600 font-bold text-white rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                    {{ __('Delete this jiri') }}
                </button>
            </form>
    </div>
    @endcan
    <div class="w-3/4 flex justify-between mt-10 ml-auto mr-auto">
        <section class="mb-32 mt-3 mr-auto ml-auto">
            <h1 class="text-white font-bold text-3xl mb-6">Students&nbsp;:</h1>
            <ul>
                @foreach($jiri->students as $student)
                    <li class="flex gap-24 justify-between text-white mb-7">
                        {{ $student->name }}
                        <form action="{{ route('attendance.update',$student->pivot->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="role" value="{{ \App\Enums\ContactRoles::Evaluator->value }}">
                            <button
                                class="bg-lime-400 text-sky-900 text-xs font-bold h-fit p-2 px-4 rounded uppercase hover:scale-105 transition-all duration-200">
                                {{ __('Change to evaluator') }}
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
        <section class="mt-3 mr-auto ml-auto">
            <h1 class="text-white font-bold text-3xl mb-6">Evaluators&nbsp;:</h1>
            <ul>
                @foreach($jiri->evaluators as $evaluator)
                    <li class="flex justify-between text-white mb-7">
                        {{ $evaluator->name }}
                        <form action="{{ route('attendance.update',$evaluator->pivot->id) }}" class="ml-4"
                              method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="role" value="{{ \App\Enums\ContactRoles::Student->value }}">
                            <button
                                class="bg-lime-400 text-sky-900 text-xs font-bold h-fit p-2 px-4 rounded uppercase hover:scale-105 transition-all duration-200">
                                {{ __('Change to student') }}
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
    <section class="flex-1 mt-3 mr-auto ml-auto">
        <h1 class="text-white font-bold text-3xl mb-6">
            {{ __('Associated projects') }}&nbsp;:
        </h1>
        <ul>
            @foreach($jiri->projects as $project)
                <li class="mb-6 text-white flex justify-between">
                    <a class="underline mr-3" href="{{ route('project.show', $project) }}">{{ $project->name }}</a>
                    <x-form.controls.button color="bg-red-600" text_color="text-white" :text="__('Remove')" ml="ml-10"/>
                </li>
            @endforeach
        </ul>
    </section>

</x-layouts.main>
