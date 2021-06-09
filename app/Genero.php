<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genero';
    protected $primaryKey = 'pk_genero';
    protected $keyType = 'string';
    public $timestamps = false;

    //Relacion de uno a muchos
    public function datosPersonales(){
        return $this->hasMany('App\DatosPersonales','pk_genero');
    }
}
