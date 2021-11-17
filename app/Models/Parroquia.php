<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    






   public function parroquias()
    {

         return $this->HasMany('App\Models\Parroquia', 'id');
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}
