<x-layouts.main>
    <h1 class="font-bold text-5xl ml-auto mr-auto mt-40 mb-10 text-white">Your Projects</h1>
    <ul class="ml-auto mr-auto">
        @foreach($projects as $project)
            <li class="mb-2"><a class="underline text-white hover:text-lime-300 duration-200" href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
        @endforeach
    </ul>

</x-layouts.main>
