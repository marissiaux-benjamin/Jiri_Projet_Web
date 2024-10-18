<?php

namespace App\Http\Controllers;

use App\Concerns\HasImageVariants;
use App\Events\ContactImageStored;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use App\Models\User;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Laravel\Facades\Image;
use Storage;

class ContactController extends Controller
{

    use HasImageVariants;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Auth::user()
            ->contacts()
            ->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = Storage::putFile('contacts/'.Auth::id().'/original', $request->file('photo'));

            ContactImageStored::dispatch($validated);
        }

        $contact = Auth::user()->contacts()->create($validated);

        return to_route('contact.show', $contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return to_route('contact.show', $contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return to_route('contacts.index');
    }
}
