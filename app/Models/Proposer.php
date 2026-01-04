<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposer extends Model
{

    protected $table='proposer';

    protected $fillable = ['trajects_id','drivers_id'];

    public function trajects(){


        return $this->belongsTo(Trajects::class);
    }

   public function drivers(){


        return $this->belongsTo(Drivers::class);
    }




    
}


