<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal1p10 extends Model
{
    



  public function getDisplayNameAttribute()
     {
         return trim(str_replace( '  ', ' ',  "{$this->tx_nombres} {$this->tx_apellidos}")) ;
     }




      public function funcionario(){
        return $this->belongsTo(Personal::class, 'personal_id');
    }



     public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'estado_id');
    }


    public function municipio()
    {
        return $this->belongsTo('App\Models\Municipio', 'municipio_id');
    }


    public function parroquia()
    {
        return $this->belongsTo('App\Models\Parroquia', 'parroquia_id');
    }
}
