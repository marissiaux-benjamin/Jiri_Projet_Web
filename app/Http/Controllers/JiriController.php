<?php

namespace App\Http\Controllers;

use App\Models\Jiri;
use Illuminate\Http\Request;

class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcomingJiris = Jiri::where('starting_at', '>', now())
            ->orderBy('starting_at')
            ->get();

        $pastJiris = Jiri::where('starting_at', '<=', now())
            ->orderBy('starting_at', 'desc')
            ->get();


        return view('jiris.index', compact('upcomingJiris', 'pastJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jiris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|between:3,255',
            'starting_at' => 'required|date_format:Y-m-d H:i',
        ]);

        $jiri = Jiri::create($validated);

        return to_route('jiri.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        return view('jiris.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
