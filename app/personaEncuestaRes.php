<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class personaEncuestaRes extends Model
{
    protected $table= 'personasEncuestaRes';

    public function owner()
    {
        return $this->belongsTo('App\User');
    }


}
