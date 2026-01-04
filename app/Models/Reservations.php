<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{

    protected $table ='reservations';

    protected $fillable = ['passengers_id','trajects_id','nb_places','date_reservation','statut'];
    


    public function passengers(){


        return $this->belongsTo(Passengers::class);
    }


    public function trajects(){


        return $this->belongsTo(Trajects::class);
    }




}
