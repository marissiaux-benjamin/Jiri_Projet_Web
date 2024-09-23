<x-layouts.main>

    <form action="/jiris" method="POST" class="flex flex-col gap-12 bg-sky-800 p-4 rounded w-2/5 ml-auto mr-auto">

        @CSRF

        <div class="flex flex-col gap-2 text-white">
            <label for="name" class="rounded text-3xl">
                Name of the project
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
            <label for="starting" class="rounded text-3xl">
                Beginning of the project
                @error('starting_at')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="starting"
                   type="text"
                   placeholder="2024-05-12 12:30"
                   name="starting_at"
                   value="{{ old('starting_at') }}"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="ml-auto mr-auto">
            <input type="submit"
                   value="Create"
                   class="bg-lime-400 font-bold text-sky-900 rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
        </div>

    </form>

</x-layouts.main>
