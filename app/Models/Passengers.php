<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passengers extends Model
{
    protected $table='passengers';

    protected $fillable = ['students_id','moyenne_p'];


    public function students(){

        return $this->belongsTo(Students::class);


    }


    public function reservations(){

        return $this->hasMany(reservations::class);

    }


    public function evaluations(){

        return $this->hasMany(Evaluations::class);

    }





}
