<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trajects;
use App\Models\Reservations;
use App\Models\Evaluations;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display the dashboard with user statistics.
     */
    public function index()
    {
        $user = auth()->user();

        $nbTrajets = $user->drivers ? $user->drivers->trajects()->count() : 0;

        $nbReservations = $user->passengers ? $user->passengers->reservations()->count() : 0;

        $noteMoyenne = 0;
        if ($user->drivers) {
            $noteMoyenne = Evaluations::where('drivers_id', $user->drivers->id)
                ->where('type_evaluation', 'passenger to driver')
                ->avg('note') ?? 0;
        }

        return view('dashboard', [
            'nbTrajets' => $nbTrajets,
            'nbReservations' => $nbReservations,
            'noteMoyenne' => number_format($noteMoyenne, 1)
        ]);
    }

  
    public function profile()
    {
        $user = auth()->user();
        
        $driverId = $user->drivers ? $user->drivers->id : null;
        $passengerId = $user->passengers ? $user->passengers->id : null;

        $noteConducteur = 0;
        $nbTrajetsConducteur = 0;
        if ($driverId) {
            $noteConducteur = Evaluations::where('type_evaluation', 'passenger to driver')
                ->where('drivers_id', $driverId)
                ->avg('note') ?? 0;
            $nbTrajetsConducteur = $user->drivers->trajects()->count();
        }

        $notePassager = 0;
        $nbTrajetsPassager = 0;
        if ($passengerId) {
            $notePassager = Evaluations::where('type_evaluation', 'driver to passenger')
                ->where('passengers_id', $passengerId)
                ->avg('note') ?? 0;
            $nbTrajetsPassager = $user->passengers->reservations()->count();
        }

        $evaluations = Evaluations::where(function($query) use ($driverId, $passengerId) {
            if ($driverId) {
                $query->orWhere(function($q) use ($driverId) {
                    $q->where('type_evaluation', 'passenger to driver')
                      ->where('drivers_id', $driverId);
                });
            }
            if ($passengerId) {
                $query->orWhere(function($q) use ($passengerId) {
                    $q->where('type_evaluation', 'driver to passenger')
                      ->where('passengers_id', $passengerId);
                });
            }
        })->latest()->get();

        return view('profile', compact(
            'noteConducteur', 
            'nbTrajetsConducteur', 
            'notePassager', 
            'nbTrajetsPassager', 
            'evaluations'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
