<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class practicaEncuestaRes extends Model
{
    protected $table= 'practicaEncuestaRes';

    public function owner()
    {
        return $this->belongsTo('App\User');
    }


}
