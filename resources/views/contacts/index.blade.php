<x-layouts.main>
    <h1 class="font-bold text-5xl text-white ml-auto mr-auto mt-40 mb-10">{{  __('Your Contacts') }}</h1>
    <ul class="ml-auto mr-auto">
        @foreach($contacts as $contact)
            <li class="mb-2"><a class="underline text-white hover:text-lime-300 duration-200"
                                href="/contacts/{{ $contact->id }}">{{ $contact->name }} - {{ $contact->email }}</a>
            </li>
        @endforeach
    </ul>

    <a href="/contact/create"
       class="bg-lime-400 ml-auto mr-auto font-bold text-sky-950 rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
        {{  __('Add a new contact') }}</a>

</x-layouts.main>
