<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EsFamiliarDe extends Model
{
    //
    protected $table = 'es_familiar_de';
    protected $primaryKey = 'pk_num_personal';
    protected $keyType = 'string';
}
