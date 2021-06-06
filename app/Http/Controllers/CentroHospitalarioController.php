<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\CentroHospitalario;

class CentroHospitalarioController extends Controller
{
    //formulario de usuarios
    public function crearCentros(){
        return View('sistema/centros_hospitalarios/crear');
    }

    //Guardar Centros medicos
    public function save(Request $request){
       
        $validator = $this->validate($request,[
            'pk_centro'=>'required|string|max:7|unique:centro_hospitalario',
            'nom_centro'=>'required|string|max:25',
            'direccion'=>'required|string|max:25',
            'telefono'=>'required|string|max:25',
            'num_registro'=>'required|string|max:25',
            'estado'=>'required|int'
        ]);
        
        $datosCento = request()->except('_token');
        CentroHospitalario::insert($datosCento);

        return back()->with('claveCentroHsave','Centro Hospitalario guardado correctamente');
    }

    //funcion para mostrar todos los Centros hospitalarios
    public function mostrarCentros(){
        $centros = CentroHospitalario::all();
        
        return View('centro/listar', compact('centros'));
    }
}
