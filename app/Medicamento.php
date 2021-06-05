<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    //
    protected $table = 'familiar';
    protected $primaryKey = 'pk_medicamento';
    protected $keyType = 'string';
}
