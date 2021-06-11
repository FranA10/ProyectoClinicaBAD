<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = 'profesion';
    protected $primaryKey = 'pk_profesion';
    protected $keyType = 'string';
    public $timestamps = false;
}
