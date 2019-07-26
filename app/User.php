<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function departamento(){
        return $this->belongsTo('App\Departamento');
    }

    //

    public function persona()
    {
        return $this->hasOne('App\personaEncuestaRes', 'owner_id');
    }

    public function practica()
    {
        return $this->hasOne('App\practicaEncuestaRes', 'owner_id');
    }

    public function proceso()
    {
        return $this->hasOne('App\procesoEncuestaRes', 'owner_id');
    }

    public function producto()
    {
        return $this->hasOne('App\productoEncuestaRes', 'owner_id');
    }

    public function aCambio()
    {
        return $this->hasOne('App\aCambioEncuestaRes', 'owner_id');
    }
    
}
