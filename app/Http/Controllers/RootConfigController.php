<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RootConfigController extends Controller
{

    //formulario del procesos iniciales
    public function vistaProceso(){
        return View('sistema/root_config/configuracion_inicial');
    }

    //Crear los Estados Civiles
    public function ejecutarES(Request $request){
        $db = DB::connection();
        $stmt = $db-> getPdo()->prepare("call ADD_ESTADOCIVIL()");
        $stmt->execute();
        
        return back()->with('EJECUTADO','Estados Civiles generados');
    }

    //Crear los Sexos
    public function ejecutarGN(Request $request){
        $db = DB::connection();
        $stmt = $db-> getPdo()->prepare("call ADD_GENEROS()");
        $stmt->execute();
        
        return back()->with('EJECUTADO','Sexos/Generos generados');
    }
}
