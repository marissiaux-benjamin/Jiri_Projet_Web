<x-layouts.main>

    <form action="/contact" method="POST" class="flex flex-col gap-12 bg-sky-800 p-4 rounded w-2/5 ml-auto mr-auto">

        @CSRF

        <div class="flex flex-col gap-2 text-white">
            <label for="name" class="rounded text-3xl">
                {{  __('Contact\'s name') }}
                @error('name')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="name"
                   placeholder="Ben"
                   name="name" value="{{ old('name') }}"
                   autocapitalize="none"
                   autocorrect="off"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="surname" class="rounded text-3xl">
                {{  __('Contact\'s surname') }}
                @error('surname')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="surname"
                   placeholder="Mari"
                   name="surname" value="{{ old('surname') }}"
                   autocapitalize="none"
                   autocorrect="off"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="email" class="rounded text-3xl">
                {{  __('Contact\'s email') }}
                @error('email')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="email"
                   type="text"
                   placeholder="ben.mari@gmail.com"
                   name="email"
                   value="{{ old('email') }}"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="ml-auto mr-auto">
            <button type="submit"
                    class="bg-lime-400 font-bold text-sky-900 rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                {{ __('Add this contact') }}
            </button>
        </div>

    </form>


</x-layouts.main>

