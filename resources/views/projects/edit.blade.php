<x-layouts.main>

    <form action="{{ route('project.update', $project) }}" method="POST"
          class="flex flex-col gap-12 bg-sky-800 p-4 rounded w-2/5 ml-auto mr-auto">

        @CSRF
        @method('PATCH')

        <div class="flex flex-col gap-2 text-white">
            <label for="name" class="rounded text-3xl">
                {{  __('Name of the project') }}
                @error('name')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="name"
                   placeholder="Jiri Project"
                   name="name" value="{{ $project->name }}"
                   autocapitalize="none"
                   autocorrect="off"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="description" class="rounded text-3xl">
                {{  __('Description of the project') }}
                @error('description')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <textarea name="description" id="description" placeholder="{{ __("This project is from an idea in between friends and I, ...") }}" rows="6" class="texte-white pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">{{ $project->description }}</textarea>
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="url" class="rounded text-3xl">
                {{  __('URL of the project') }}
                @error('url')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="url"
                   placeholder="http://project.com"
                   name="url" value="{{ $project->url }}"
                   autocapitalize="none"
                   autocorrect="off"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="ml-auto mr-auto">
            <button type="submit"
                    class="bg-lime-400 font-bold text-sky-900 rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                {{ __('Modify this project') }}
            </button>
        </div>

    </form>

</x-layouts.main>

