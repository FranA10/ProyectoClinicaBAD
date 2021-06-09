<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroHospitalario extends Model
{
    protected $table = 'centro_hospitalario';
    protected $primaryKey = 'pk_centro';
    protected $keyType = 'string';
    public $timestamps = false;
    
    //Relacion de uno a muchos (inversa)
    public function datosPersonales(){
        return $this->hasMany('App\DatosPersonales', 'pk_centro');
    }
}
