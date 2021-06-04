<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    //
    protected $table = 'genero';
    protected $primaryKey = 'pk_genero';
    protected $keyType = 'string';
}
