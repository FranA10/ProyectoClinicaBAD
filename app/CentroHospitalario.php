<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroHospitalario extends Model
{
    protected $table = 'centro_hospitalario';
    protected $primaryKey = 'pk_centro';
    protected $keyType = 'string';

}
