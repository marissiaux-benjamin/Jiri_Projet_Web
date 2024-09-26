<x-layouts.main>
    <h1 class="font-bold text-5xl text-white ml-auto mr-auto mt-40">{{ $contact->name }}</h1>
    <p class="text-white text-2xl ml-auto mr-auto">
        {{ $contact->email }}
    </p>
    <div class="flex gap-5 justify-between ml-auto mr-auto">

        <a href="/contacts/{{ $contact->id }}/edit"
           class="bg-lime-400 font-bold text-sky-950 rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
            {{  __('Modify this contact') }}</a>

        <form method="POST" action="{{ route('contact.destroy', $contact) }}">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="bg-red-600 font-bold text-white rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                {{ __('Delete this contact') }}
            </button>
        </form>
    </div>
</x-layouts.main>
