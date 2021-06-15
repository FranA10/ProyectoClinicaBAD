<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoSangre;
use DB;

class TipoSangreController extends Controller
{
    //formulario del proceso Tipo Sangre

    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:listarTS');

    }

    public function vistaProceso(){
        return View('sistema/tipo_sangre/ejecutarCrear');
    }

    //Crear los tipos de sangre
    public function ejecutar(Request $request){
        $db = DB::connection();
        $stmt = $db-> getPdo()->prepare("call ADD_TIPOSANGRE()");
        $stmt->execute();
        
        return back()->with('EJECUTADO','Tipos de sangre generados');
    }

    //funcion para mostrar todos los TS
    public function mostrarTipos(){
        $datosTipo['tipo'] = TipoSangre::paginate(4);
        
        return View('sistema/tipo_sangre/listar', $datosTipo);
    }

    //funcion para eliminar los Tipos de sangre(no se deberia hacer)
    public function eliminarTipo($pk_codsangre){
        TipoSangre::destroy($pk_codsangre);

        return back()->with('claveEliminar','OK');
    }
}
