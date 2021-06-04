<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSangre extends Model
{
    //
    protected $table = 'tipo_sangre';
    protected $primaryKey = 'pk_codsangre';
    protected $keyType = 'string';
}
