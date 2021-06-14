<?php

namespace App\Http\Controllers;

use App\Examen;
use Illuminate\Http\Request;

class ExamenMedicoController extends Controller
{

    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:crear_examenes')->only('crearExamen');
        $this->middleware('can:ver_examen')->only('lista');


    }

    public function lista(){
        $examenesPaciente=Examen::paginate(7);
        return view('sistema.examen_medico.examenes')->with(['objetos' => $examenesPaciente] ) ;
    }

    public function crearExamen(){

        return view('sistema.examen_medico.create');
    }
}
