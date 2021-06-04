<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model
{
    protected $table = 'datos_personales';
    protected $primaryKey = 'pk_num_personal';
    protected $keyType = 'string';
}
