<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
    protected $table = 'horario';
    protected $primaryKey = 'pk_horario';
    public $timestamps = false;

    // protected $casts = [
    //     'hora_inicio' => 'datetime:h i',
    // ];
    
    
    // $event->time->format('h i')->toTimeString()
}
