<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoExamen extends Model
{
    //
    protected $table = 'tipo_examen';
    protected $primaryKey = 'pk_tipo_examen';
    public $timestamps = false;
}
