<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaMedicamento extends Model
{
    protected $table = 'categoria_medicamento';
    protected $primaryKey = 'pk_categ_mdtot';
    protected $keyType = 'string';
}
