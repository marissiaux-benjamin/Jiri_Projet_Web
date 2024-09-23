<x-layouts.main>

    <form action="/project" method="POST" class="flex flex-col gap-12 bg-sky-800 p-4 rounded w-5/6 ml-auto mr-auto">
        @csrf

        <div class="flex flex-col gap-2 text-white">
            <label for="name" class="rounded text-3xl">
                {{  __('Name of the project') }}
                @error('name')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="name"
                   placeholder="Jiri Project"
                   name="name" value="{{ old('name') }}"
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
            <textarea id="description" name="description" placeholder="Ce projet est un des plus gros projet..." rows="6"
                      class="texte-white pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400"></textarea>
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="url" class="rounded text-3xl">
                {{  __('Name of the project') }}
                @error('url')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="url"
                   placeholder="http://medhurst.com"
                   name="url" value="{{ old('url') }}"
                   autocapitalize="none"
                   autocorrect="off"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="ml-auto mr-auto">
            <button type="submit"
                    class="bg-lime-400 font-bold text-sky-900 rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                {{ __('Create this project') }}
            </button>
        </div>


    </form>

</x-layouts.main>
