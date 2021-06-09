<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatDiagnostico extends Model
{
    protected $table = 'cat_diagnostico';
    protected $primaryKey = 'pk_cod_inter';
    public $timestamps = false;

}
