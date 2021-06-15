<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\CentroHospitalario;

class CentroHospitalarioController extends Controller
{
    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:listCentro')->only('mostrarCentros');
        $this->middleware('can:formularioCentros')->only('crearCentros', 'save');
        $this->middleware('can:editFormCentro')->only('actualizarCentros', 'editarCentro');


    }

    //formulario de usuarios
    public function crearCentros(){
        return View('sistema/centros_hospitalarios/crear');
    }

    //Guardar Centros medicos
    public function save(Request $request){
       
        $validator = $this->validate($request,[
            'pk_centro'=>'required|string|max:7|unique:centro_hospitalario',
            'nom_centro'=>'required|string|max:50',
            'direccion'=>'required|string|max:75',
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
        $datosCentro['centros'] = CentroHospitalario::paginate(3);
        
        return View('sistema/centros_hospitalarios/listar', $datosCentro);
    }

    //funcion para eliminar centros Eliminar(no se deberia hacer)
    public function eliminarCentros($pk_centro){
        CentroHospitalario::destroy($pk_centro);

        return back()->with('claveEliminarCentro','El Centro fue Eliminado!');
    }

    //funcion para Editar Centros
    public function actualizarCentros($pk_centro){
        $centro = CentroHospitalario::findOrFail($pk_centro);

        return view('sistema/centros_hospitalarios/editar', compact('centro'));
    }

    public function editarCentro(Request $request, $pk_centro){
        $datosCento = request()->except((['_token', '_method']));
        CentroHospitalario::where('pk_centro', '=', $pk_centro)->update($datosCento);

        return back()->with('claveEditarCentro','Centro modificado!');
    }
}
