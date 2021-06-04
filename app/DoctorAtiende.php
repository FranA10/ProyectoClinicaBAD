<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAtiende extends Model
{
    protected $table = 'doctor_atiende';
    protected $primaryKey = 'pk_num_personal';
    protected $keyType = 'string';
}
