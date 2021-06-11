<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    protected $primaryKey = 'pk_ciudad';
    public $timestamps = false;
    
    //Relacion de uno a muchos (inversa)
    public function pais(){
        return $this->belongsTo('App\Pais','pk_pais');
    }

    //Relacion de uno a muchos
    public function datosPersonales(){
        return $this->hasMany('App\DatosPersonales','pk_ciudad');
    }
}
