<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $table='drivers';
    protected $fillable = ['students_id','moyenne_c','vehicule'];

public function students(){

return $this->belongsTo(Students::class);

}

public function trajects(){
     
    return $this->hasMany(Trajects::class);

}


public function proposer(){
     
    return $this->hasMany(Proposer::class);

}

public function evaluations(){
     
    return $this->hasMany(Evaluations::class);

}




}
