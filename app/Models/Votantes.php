<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votantes extends Model
{
    



    public function gerencia()
    {
        return $this->belongsTo('App\Models\Gerencias', 'gerencia_id');
    }


    public function personal()
    {
        return $this->belongsTo('App\Models\Personal', 'personal_id');
    }




     public function getDisplayStatusAttribute()
    {
        return $this->confirmed == 1 ? 'Ejerció el voto' : 'No ejerció el voto';
    }
}
