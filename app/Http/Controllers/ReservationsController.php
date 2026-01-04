<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Models\Trajects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations=Reservations::all();
        return view("reservations.index",compact('reservations'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Trajects $trajects)
    {
        return view("reservations.create", compact('trajects'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
    'trajects_id'   => 'required|exists:trajects,id',
    'nb_places'   => 'required|integer|min:1',
    'date_reservation' => 'required|date',
]);

    $trajects = Trajects::findOrFail($request->trajects_id);

    if ($trajects->nb_places_disponibles < $request->nb_places) {
        return back()->withErrors(['nb_places' => 'Nombre de places insuffisant']);
    }

    $user = Auth::user();
    if (!$user->passengers) {
         $passenger = \App\Models\Passengers::create([
            'students_id' => $user->id,
            'moyenne_p' => 0
        ]);
         $passenger_id = $passenger->id;
    } else {
         $passenger_id = $user->passengers->id;
    }
       
      $reservations = Reservations::create([
        'passengers_id'      => $passenger_id,
        'trajects_id'        => $request->trajects_id,
        'nb_places'        => $request->nb_places,
        'date_reservation' => $request->date_reservation,
        'statut' => 'Disponible'
    ]);

    $trajects->nb_places_disponibles -= $request->nb_places;
    $trajects->save();

    return redirect()->route('dashboard')->with('success', 'Réservation effectuée avec succès');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Reservations $reservations)
    {
        return view("reservations.show", compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations $reservations)
    {
        return view("reservations.edit", compact('reservations'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations $reservations)
    {
        $request->validate([
            'nb_places' => 'required|integer|min:1',
        ]);

        $trajects = $reservations->trajects;

        // Calculate the difference in seats
        $difference = $request->nb_places - $reservations->nb_places;

        // Check if there are enough places available for an increase
        if ($difference > 0 && $trajects->nb_places_disponibles < $difference) {
            return back()->withErrors(['nb_places' => 'Nombre de places insuffisant sur ce trajet.']);
        }

        // Adjust available places in the trip
        $trajects->nb_places_disponibles -= $difference;
        $trajects->save();

        // Update the reservation
        $reservations->update([
            'nb_places' => $request->nb_places,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations $reservations)
    {
        $reservations->delete();
return redirect()->route("reservations.index");
    }
}
