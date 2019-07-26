<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aCambioEncuestaRes extends Model
{
    protected $table= 'aCambioEncuestaRes';

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
