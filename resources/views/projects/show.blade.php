<x-layouts.main>
    <h1 class="font-bold text-5xl text-white ml-auto mr-auto mt-40 mb-10">{{ $project->name }}</h1>
    <div class="w-1/2 ml-auto mr-auto mb-10">
        <h2 class="font-bold text-3xl text-white mb-3">{{  __('Description') }}</h2>
        <p class="text-lg text-white">
            {{ $project->description }}
        </p>
    </div>
    <div class="w-1/2 ml-auto mr-auto">
        <h2 class="font-bold text-3xl text-white">URL</h2>
        <p class="text-white text-lg">
            {{ $project->url }}
        </p>
    </div>

    <div class="flex gap-5 justify-between ml-auto mr-auto">
        @can('update',$project)
            <a href="/projects/{{ $project->id }}/edit"
               class="bg-lime-400 font-bold text-sky-950 rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
                {{  __('Modify this project') }}</a>
        @endcan
        @can('delete',$project)
            <form method="POST" action="{{ route('project.destroy', $project) }}">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="bg-red-600 font-bold text-white rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                    {{ __('Delete this project') }}
                </button>
            </form>
    @endcan
    </div>
</x-layouts.main>
