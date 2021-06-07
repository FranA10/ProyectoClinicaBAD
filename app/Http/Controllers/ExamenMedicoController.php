<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamenMedicoController extends Controller
{
    public function ejemplo(){
        return view('sistema.examen_medico.examen');
    }
}
