<x-layouts.main>
    <h1 class="font-bold text-5xl ml-auto mr-auto mt-40 mb-10 text-white">{{  __('Your Projects') }}</h1>
    <ul class="ml-auto mr-auto">
        @foreach($projects as $project)
            <li class="mb-2"><a class="underline text-white hover:text-lime-300 duration-200" href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
        @endforeach
    </ul>
    <a href="/projects/create"
       class="bg-lime-400 ml-auto mr-auto font-bold text-sky-950 rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
        {{  __('Create a new project') }}</a>
</x-layouts.main>
