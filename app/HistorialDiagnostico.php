<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialDiagnostico extends Model
{
    protected $table = 'hist_diagnostico';
    protected $primaryKey = 'pk_diagnostico';
    public $timestamps = false;
    protected $dateFormat = 'DD-MON-RR';

}
