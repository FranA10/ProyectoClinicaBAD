<?php

namespace App\Http\Controllers;

use App\Examen;
use Illuminate\Http\Request;

class ExamenMedicoController extends Controller
{
    public function lista(){
        $examenesPaciente=Examen::paginate(7);
        return view('sistema.examen_medico.examenes')->with(['objetos' => $examenesPaciente] ) ;
    }

    public function crearExamen(){

        return view('sistema.examen_medico.create');
    }
}
