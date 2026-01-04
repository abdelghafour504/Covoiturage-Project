<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Authenticatable
{
    
    protected $table='students';

    protected $fillable = ['nom','prenom','telephone','email','password','drivers_id','passengers_id'];

    public function drivers(){

        return $this->hasOne(Drivers::class);

    } 

    public function passengers(){

        return $this->hasOne(Passengers::class);

    }





}
