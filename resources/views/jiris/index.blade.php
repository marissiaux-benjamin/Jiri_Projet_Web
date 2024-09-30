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

    <x-form.controls.links color="bg-lime-400" text_color="text-sky-900" url_route="jiris/create" :text="__('Create a new Jiri')"/>

</x-layouts.main>

