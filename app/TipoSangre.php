<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSangre extends Model
{
    protected $table = 'tipo_sangre';
    protected $primaryKey = 'pk_codsangre';
    protected $keyType = 'string';
    public $timestamps = false;

    //Relacion de uno a muchos (inversa)
    public function tiposdesangre(){
        return $this->hasMany('App\TipoSangre', 'pk_codsangre');
    }

}
