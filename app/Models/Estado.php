<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    



    public function municipios()
    {

         return $this->HasMany('App\Models\Municipio', 'estado_id');
    }

}
