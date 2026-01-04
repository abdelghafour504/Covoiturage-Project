<?php

namespace App\Http\Controllers;

use App\Models\Evaluations;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $evaluations=Evaluations::all();
        return view("evaluations.index",compact('evaluations'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = \App\Models\Drivers::with('students')->get();
        $passengers = \App\Models\Passengers::with('students')->get();
        return view("evaluations.create", compact('drivers', 'passengers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'passengers_id' => 'required|exists:passengers,id',
            'drivers_id' => 'required|exists:drivers,id',
            'note' => 'required|numeric|min:0|max:5',
            'commentaire' => 'nullable|string',
            'type_evaluation' => 'required|in:driver to passenger,passenger to driver'
        ]);

        Evaluations::create($validated);

        return redirect()->route('dashboard')
                         ->with('success', 'Évaluation créée avec succès.');
        


    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluations $evaluations)
    {
            return view("evaluations.show",compact('evaluations'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluations $evaluations)
    {
    return view("evaluations.edit",compact('evaluations'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluations $evaluations)
    {
        $validated = $request->validate([
            'passengers_id' => 'required|exists:passengers,id',
            'drivers_id' => 'required|exists:drivers,id',
            'note' => 'required|numeric|min:0|max:5',
            'commentaire' => 'nullable|string',
            'type_evaluation' => 'required|in:driver to passenger,passenger to driver'
        ]);


        $evaluations = Evaluations::findOrFail($evaluations->id);
        $evaluations->update($validated);

        return redirect()->route('dashboard')
                         ->with('success', 'Évaluation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluations $evaluations)
    {
        $evaluations->delete();
return redirect()->route("dashboard");
    }
}
