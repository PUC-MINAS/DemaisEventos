<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    public function evento(){
        return $this->belongsTo('App\Evento')->first();
    }

    public function user(){
        return $this->belongsTo('App\User')->first();
    }
}
