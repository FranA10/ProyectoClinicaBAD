<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civil';
    protected $primaryKey = 'pk_estado';
    protected $keyType = 'string';
    public $timestamps = false;

    //Relacion de ono a muchos
    public function datosPersonales(){
        return $this->hasMany('App\DatosPersonales', 'pk_estado_civil');
    }
}
