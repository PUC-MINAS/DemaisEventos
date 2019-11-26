<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //

    function dataInicio(){
        return explode(" ", $this->inicio)[0];
    }

    function dataFim(){
        return explode(" ", $this->fim)[0];
    }

    function horaInicio(){
        return explode(" ", $this->inicio)[1];
    }

    function horaFim(){
        return explode(" ", $this->fim)[1];
    }

    function user(){
       return $this->belongsTo('App\User')->first();
    }

    function presencas(){
        return $this->hasMany('App\Presenca')->get();
    }
}
