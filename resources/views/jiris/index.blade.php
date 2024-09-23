<x-layouts.main>

    <h1 class="font-bold mb-10 mt-14 ml-auto mr-auto text-6xl text-white mt-40">{{  __('Your Jiris') }}</h1>
    <div class="flex gap-52 justify-center mb-6">
        <section>
            <h2 class="font-bold mb-5 text-3xl text-white">{{  __('Upcoming Jiris') }}</h2>
            <x-jiris.list :jiris="$upcomingJiris"/>
        </section>

        <section>
            <h2 class="font-bold mb-5 text-3xl text-white">{{  __('Past Jiris') }}</h2>
            <x-jiris.list :jiris="$pastJiris"/>
        </section>
    </div>

    <a href="/jiris/create"
       class="bg-lime-400 ml-auto mr-auto font-bold text-sky-950 rounded p-2 px-4 uppercase w-fit hover:scale-105 transition-all duration-200">
        {{  __('Create a new project') }}</a>

</x-layouts.main>

