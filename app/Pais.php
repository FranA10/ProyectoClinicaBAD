<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    //
    protected $table = 'pais';
    protected $primaryKey = 'pk_pais';
    protected $keyType = 'string';
}
