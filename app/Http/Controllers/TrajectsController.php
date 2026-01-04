<?php

namespace App\Http\Controllers;

use App\Models\Trajects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TrajectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trajects=Trajects::all();
        return view("trajects.index",compact('trajects'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("trajects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'date_heure' => 'required|date',
        'quartier_depart' => 'required|string',
        'quartier_arrivee' => 'required|string',
        'nb_places_disponibles' => 'required|integer|min:1',
        'prix' => 'required|numeric|min:0',
        'commentaire' => 'nullable|string',
        'statut' => 'required|in:Disponible,Complet'
    ]);

        // Automatically assign the driver ID from the authenticated user
        $user = Auth::user();
        if (!$user->drivers) {
            $driver = \App\Models\Drivers::create([
                'students_id' => $user->id,
                'moyenne_c' => 0,
                'vehicule' => 'Non spécifié'
            ]);
            $validated['drivers_id'] = $driver->id;
        } else {
            $validated['drivers_id'] = $user->drivers->id;
        }


    Trajects::create($validated);

    return redirect()->route('dashboard')
        ->with('success', 'Trajet ajouté avec succès');
}

    /**
     * Display the specified resource.
     */
    public function show(Trajects $trajects)
    {
        return view(("trajects.show"),compact('trajects')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trajects $trajects)
    {
                return view(("trajects.edit"),compact('trajects')) ;

    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Trajects $trajects)
{
    $validated = $request->validate([
        'drivers_id' => 'required|exists:drivers,id',
        'date_heure' => 'required|date',
        'quartier_depart' => 'required|string',
        'quartier_arrivee' => 'required|string',
        'nb_places_disponibles' => 'required|integer|min:1',
        'prix' => 'required|numeric|min:0',
        'commentaire' => 'nullable|string',
        'statut' => 'required|in:Disponible,Complet'
    ]);

    $trajects->update($validated);

    return redirect()->route('dashboard')
        ->with('success', 'Trajet modifié avec succès');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trajects $trajects)
    {
        $trajects->delete();
return redirect()->route("dashboard");
    }
}
