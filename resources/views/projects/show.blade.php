<x-layouts.main>
    <h1 class="font-bold text-5xl text-white ml-auto mr-auto mt-40 mb-10">{{ $project->name }}</h1>
    <div class="w-1/2 ml-auto mr-auto mb-10">
        <h2 class="font-bold text-3xl text-white mb-3">Description</h2>
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
</x-layouts.main>
