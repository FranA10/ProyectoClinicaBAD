<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model
{
    protected $table = 'datos_personales';
    protected $primaryKey = 'pk_num_personal';
    protected $keyType = 'string';
    public $timestamps = false;

    //Relacion de ono a muchos (inversa)
    public function estadoCivil(){
        return $this->belongsTo('App\EstadoCivil','pk_estado_civil');
    }

    //Relacion de ono a muchos (inversa)
    public function ciudad(){
        return $this->belongsTo('App\Ciudad','pk_ciudad');
    }

    //Relacion de ono a muchos (inversa)
    public function genero(){
        return $this->belongsTo('App\Genero','pk_genero');
    }
    
    //Relacion de ono a muchos (inversa)
    public function tipoSangre(){
        return $this->belongsTo('App\Tipo','pk_codsangre');
    }
    
    //Relacion uno a uno
    public function usuario(){
        return $this->hasOne('App\SisUsuario','pk_num_personal');
    }
}
