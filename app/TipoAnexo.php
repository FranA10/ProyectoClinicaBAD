<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAnexo extends Model
{
    //
    protected $table = 'tipo_anexo';
    protected $primaryKey = 'id_tipo_anexo';
    public $timestamps = false;
}
