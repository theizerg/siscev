<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gerencias extends Model
{



     public function entes()
    {
        return $this->belongsTo('App\Models\Ente', 'ente_id');
    }
}
