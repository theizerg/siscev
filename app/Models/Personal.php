<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    
    public function ente()
    {
        return $this->belongsTo('App\Models\Ente', 'ente_id');
    }


    public function gerencia()
    {
        return $this->belongsTo('App\Models\Gerencias', 'gerencia_id');
    }


     public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Jubilado';
    }


    public function getDisplayNameAttribute()
     {
         return trim(str_replace( '  ', ' ',  "{$this->tx_nombres} {$this->tx_apellidos}")) ;
     }
}
