<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesion;

class ProfesionController extends Controller
{
    //formulario de profesiones
    public function verFormProfesion(){
        return View('sistema/profesion/crear');
    }

    //Guardar Profesiones
    public function guardarProfesion(Request $request){
       
        $validator = $this->validate($request,[
            'pk_profesion'=>'required|string|max:5|unique:profesion',
            'nombre'=>'required|string|max:30',
            'estado'=>'required|int'
        ]);
        
        $datos = request()->except('_token');
        Profesion::insert($datos);

        return back()->with('claveGuardarProfesion','Profesion guardado correctamente');
    }

    //funcion para mostrar todas las profesiones
    public function mostrarProfesiones(){
        $datos['profesiones'] = Profesion::paginate(5);
        
        return View('sistema/profesion/listar', $datos);
    }

    //funcion para eliminar Profesiones(no se deberia hacer)
    public function eliminarProfesion($pk_profesion){
        Profesion::destroy($pk_profesion);

        return back()->with('claveEliminarProfesion','OK');
    }

    //funcion para Editar Profesion
    public function actualizarProfesion($pk_profesion){
        $profesion = Profesion::findOrFail($pk_profesion);

        return view('sistema/profesion/editar', compact('profesion'));
    }

    public function editarProfesion(Request $request, $pk_profesion){
        $datos = request()->except((['_token', '_method']));
        Profesion::where('pk_profesion', '=', $pk_profesion)->update($datos);

        return back()->with('claveEditarProfesion','Profesion modificado!');
    }
}
