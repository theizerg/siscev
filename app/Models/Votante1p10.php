<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votante1p10 extends Model
{
    



      public function ente()
    {
        return $this->belongsTo('App\Models\Ente', 'ente_id');
    }



    public function gerencia()
    {
        return $this->belongsTo('App\Models\Gerencias', 'gerencia_id');
    }




    public function personal()
    {
        return $this->belongsTo('App\Models\Personal', 'funcionario_id');
    }


    public function persona()
    {
        return $this->belongsTo('App\Models\Personal1p10', 'personal_p_id');
    }




     public function getDisplayStatusAttribute()
    {
        return $this->confirmed == 1 ? 'Ejerció el voto' : 'No ejerció el voto';
    }
}
