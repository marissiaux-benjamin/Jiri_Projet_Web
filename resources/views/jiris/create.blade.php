<x-layouts.main>

    <form action="/jiris" method="POST" class="flex flex-col gap-12 bg-sky-800 p-4 rounded w-8/12 ml-auto mr-auto">

        @csrf

        <div class="flex flex-col gap-2 text-white">
            <label for="name" class="rounded text-3xl">
                {{  __('Name of the jiri') }}
                @error('name')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="name"
                   placeholder="Jiri Project"
                   name="name" value="{{ old('name') }}"
                   autocapitalize="none"
                   autocorrect="off"
                   class=" border-none pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>

        <div class="flex flex-col gap-2 text-white">
            <label for="starting" class="rounded text-3xl">
                {{  __('Beginning of the project') }}
                @error('starting_at')
                <span class=" block text-lg text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <input id="starting"
                   type="text"
                   placeholder="2024-05-12 12:30"
                   name="starting_at"
                   value="{{ old('starting_at') }}"
                   class="border-none pl-2 text-lg rounded outline-none text-white bg-sky-900 focus:border-2 focus:border-lime-400">
        </div>
        <div class="flex justify-around">

            <div>
                <p class="mb-7 text-3xl font-bold text-white">
                    {{ __("Participants list") }}&nbsp;:
                </p>
                <ul>
                    @foreach($contacts as $contact)
                        <li class="mr-auto mb-7 flex gap-10 w-5/6 justify-between items-center">
                            <input @checked(in_array($contact->id, old('contacts',[]) )) class="rounded"
                                   name="contacts[]"
                                   type="checkbox"
                                   id="contact_{{ $contact->id }}" value="{{ $contact->id }}">
                            <label class="text-white" for="contact_{{ $contact->id }}">
                                {{ $contact->name }}
                            </label>
                            <select class="bg-lime-400 border-none text-sky-900 rounded font-bold"
                                    name="role-{{ $contact->id }}" id="role-{{ $contact->id }}">
                                <option
                                    @selected(old('role-' . $contact->id) == \App\Enums\ContactRoles::Student->value) value="{{ \App\Enums\ContactRoles::Student->value }}">{{ __('Student') }}</option>
                                <option
                                    @selected(old('role-' . $contact->id) == \App\Enums\ContactRoles::Evaluator->value) value="{{ \App\Enums\ContactRoles::Evaluator->value }}">{{ __('Evaluator') }}</option>
                            </select>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div>
                <p class="mb-7 text-3xl font-bold text-white">
                    {{ __("Projects list") }}&nbsp;:
                </p>
                <ul>
                    @foreach($projects as $project)
                        <li class="ml-auto mr-auto mb-7 flex gap-10 justify-between items-center">
                            <input @checked(in_array($project->id, old('projects',[]) )) class="rounded"
                                   name="projects[]"
                                   type="checkbox"
                                   id="project_{{ $project->id }}" value="{{ $project->id }}">
                            <label class="text-white" for="project_{{ $project->id }}">
                                {{ $project->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="ml-auto mr-auto">
            <button type="submit"
                    class="bg-lime-400 font-bold text-sky-900 w-full rounded p-2 px-4 uppercase hover:scale-105 transition-all duration-200">
                {{ __('create this jiri') }}
            </button>
        </div>

    </form>

</x-layouts.main>
