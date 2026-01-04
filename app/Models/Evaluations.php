<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    protected $table='evaluations';

    protected $fillable = ['passengers_id','drivers_id','type_evaluation','note','commentaire'];


    public function passengers(){

        return $this->belongsTo(Passengers::class);
    }


    public function drivers(){

        return $this->belongsTo(Drivers::class);
    }
}
