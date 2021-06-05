<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SisUsuario extends Model
{
    //
    protected $table = 'sis_usuario';
    protected $primaryKey = 'pk_codigo_user';
    protected $keyType = 'string';
}
