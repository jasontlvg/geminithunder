<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procesoEncuestaRes extends Model
{
    protected $table= 'procesosEncuestaRes';

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
