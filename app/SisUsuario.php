<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SisUsuario extends Model
{
    protected $table = 'sis_usuario';
    protected $primaryKey = 'pk_codigo_user';
    protected $keyType = 'string';
    public $timestamps = false;

    //Relacion de uno a muchos (inversa)
    public function centro(){
        return $this->belongsTo('App\CentroHospitalario','pk_centro');
    }

    //Relacion uno a uno
    public function datosPersonales(){
        return $this->belongsTo('App\DatosPersonales','pk_num_personal');
    }
}
