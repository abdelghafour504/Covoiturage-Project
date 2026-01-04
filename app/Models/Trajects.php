<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajects extends Model
{
    
    protected $table='trajects';

    protected $fillable = ['drivers_id','date_heure','quartier_depart','quartier_arrivee','nb_places_disponibles','prix','commentaire','statut'];

    public function drivers(){

        return $this->belongsTo(Drivers::class);
    }        

    public function reservations(){

        return $this->hasMany(Reservations::class);
    }




}
