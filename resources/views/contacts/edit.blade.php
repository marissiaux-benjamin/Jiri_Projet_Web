<x-layouts.main>

    <form action="{{ route('contact.update', $contact) }}" method="POST"
          class="flex flex-col gap-12 bg-sky-800 p-4 rounded w-2/5 ml-auto mr-auto"
          enctype="multipart/form-data">

        @CSRF
        @method('PATCH')

        <div class="flex flex-col gap-2 text-white">
            <label for="name" class="rounded text-3xl">
                {{  __('Contact\'s name') }}
                @error('name')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="name"
                   placeholder="Charles"
                   name="name" value="{{ $contact->name }}"
                   autocapitalize="none"
                   autocorrect="off"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="email" class="rounded text-3xl">
                {{  __('Contact\'s email') }}
                @error('starting_at')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="email"
                   type="text"
                   placeholder="ben.mari@gmail.com"
                   name="email"
                   value="{{ $contact->email }}"
                   class="pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="photo">
                {{ __('User\'s profile picture') }}
                @error('photo')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <img src="{{ asset($contact->photo) }}" alt="profile picture" class="rounded">

            <input type="file" id="photo" class="border-gray-500 border-2 rounded text-lg pt-2 pb-2 pl-1 bg-sky-900"
                   name="photo">
        </div>

        <div class="ml-auto mr-auto">
            <x-form.controls.button color="bg-lime-400" :text="__('Register')" text_color="text-sky-900" ml="0"/>
        </div>


    </form>

</x-layouts.main>

