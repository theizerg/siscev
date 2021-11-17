<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    




    public function parroquias()
    {

         return $this->HasMany('App\Models\Parroquia', 'municipio_id');
    }


     public function estado(){
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
