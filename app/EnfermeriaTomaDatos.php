<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnfermeriaTomaDatos extends Model
{
    protected $table = 'enfermeria_toma_datos';
    protected $primaryKey = 'pk_num_personal';
    protected $keyType = 'string';
}
