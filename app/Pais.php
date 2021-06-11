<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais';
    protected $primaryKey = 'pk_pais';
    protected $keyType = 'string';
    public $timestamps = false;

    //Relacion de uno a muchos
    public function ciudades(){
        return $this->hasMany('App\Ciudad','pk_pais');
    }
}
