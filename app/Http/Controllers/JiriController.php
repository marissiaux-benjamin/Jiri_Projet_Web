<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriStoreRequest;
use App\Http\Requests\JiriUpdateRequest;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pastJiris = Auth::user()?->pastJiris()
            ->get();

        $upcomingJiris = Auth::user()?->upcomingJiris()
            ->get();


        return view('jiris.index', compact('upcomingJiris', 'pastJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Auth::user()?->projects()->get();
        $contacts = Auth::user()->contacts()->get();

        return view('jiris.create', compact('contacts', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriStoreRequest $request): RedirectResponse
    {
        $jiri = Auth::user()->jiris()->create($request->validated());

        if ($jiri) {
            foreach ($request->input('contacts') as $contact_id) {
                $role = $request->input('role-' . $contact_id);
                $jiri->contacts()->attach($contact_id, ['role' => $role]);
            }
        }

        foreach ($request->input('projects') as $project_id) {
            $jiri->projects()->attach($project_id);
        }

        return to_route('jiri.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        $jiri->load('projects');
        $jiri->load(['students', 'evaluators']);
        return view('jiris.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jiri $jiri)
    {
        return view('jiris.edit', compact('jiri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JiriUpdateRequest $request, Jiri $jiri)
    {
        $jiri->update($request->validated());

        return to_route('jiri.show', $jiri);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jiri $jiri)
    {

        $jiri->delete();

        return to_route('jiris.index');
    }
}
