<x-layouts.main>
    <img class="ml-auto mr-auto"
            srcset=" {{asset('contacts/'.Auth::id().'/large/'.basename($contact->photo))}} 720w,{{asset('contacts/'.Auth::id().'/medium/'.basename($contact->photo))}} 500w,{{asset('contacts/'.Auth::id().'/small/'.basename($contact->photo))}} 300w"
            sizes="(max-width: 800px) 300px,(max-width: 1000px) 500px, 720px" src="{{asset($contact->photo)}}"
            alt="Photo de profile">

    <h1 class="font-bold text-5xl text-white ml-auto mr-auto mt-5">{{ $contact->name }}</h1>
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
