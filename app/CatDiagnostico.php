<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatDiagnostico extends Model
{
    protected $table = 'cat_diagnostico';
    protected $primaryKey = 'pk_cod_inter';
<<<<<<< HEAD
    public $timestamps = false;

=======
    protected $keyType = 'string';
    public $timestamps = false;
>>>>>>> 4085df0d3e382456c694408ffa4b3948833ee00b
}
