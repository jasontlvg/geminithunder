<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productoEncuestaRes extends Model
{
    protected $table= 'productoEncuestaRes';

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

}
