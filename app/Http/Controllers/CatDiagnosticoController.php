<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatDiagnostico;

class CatDiagnosticoController extends Controller
{
    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:listCD');

    }

    //formulario de Cat Diagnosticos
    public function verFormCatDig(){
        return View('sistema/cat_diagnostico/crear');
    }

    //Guardar Cat Diagnosticos
    public function guardarCatDig(Request $request){
       
        $validator = $this->validate($request,[
            'pk_cod_inter'=>'required|string|max:10|unique:cat_diagnostico',
            'nombre_diagnostico'=>'required|string|max:100',
            'descripcion'=>'required|string|max:100',
        ]);
        
        $datos = request()->except('_token');
        CatDiagnostico::insert($datos);

        return back()->with('claveSaveCD','Dignostico guardado correctamente');
    }

    //funcion para mostrar todos los Diagnosticos
    public function mostrarCatDig(){
        $diagnostico['diagnostico'] = CatDiagnostico::paginate(10);
        
        return View('sistema/cat_diagnostico/listar', $diagnostico);
    }

    //funcion para eliminar Diagnosticos
    public function eliminarCatDig($pk_cod_inter){
        CatDiagnostico::destroy($pk_cod_inter);

        return back()->with('claveEliminarCD','OK');
    }

    //funcion para Editar Cat Diagnosticos
    public function actualizarCatDig($pk_cod_inter){
        $diagnostico = CatDiagnostico::findOrFail($pk_cod_inter);

        return view('sistema/cat_diagnostico/editar', compact('diagnostico'));
    }

    public function editarCatDig(Request $request, $pk_cod_inter){
        $datos = request()->except((['_token', '_method']));
        CatDiagnostico::where('pk_cod_inter', '=', $pk_cod_inter)->update($datos);

        return back()->with('claveEditarCD','Diagnostico modificado!');
    }
}
