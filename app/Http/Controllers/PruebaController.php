<?php

namespace App\Http\Controllers;

use App\CentroHospitalario;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function centro()
    {
        $nuevo = new CentroHospitalario();
        $nuevo->id_centro="3";
        $nuevo->nom_centro="Centro";
        $nuevo->direccion="direccion";
        $nuevo->telefono="7777-7777";
        $nuevo->num_registro="ghjkl";
        $nuevo->estado=1;
       // $nuevo->save();
    //    $var2=Centro::find(1);
    //    $var2->nom_centro="centro2cambiadott";
    //    $var2->save();
        $var= CentroHospitalario::all();
        return $var;
    }
}
