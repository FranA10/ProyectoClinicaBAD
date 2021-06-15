<?php

namespace App\Http\Controllers;

use App\DTO\ExamenDTO;
use App\Examen;
use App\TipoExamen;
use Illuminate\Http\Request;

class ExamenMedicoController extends Controller
{

    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:crear_examen')->only('crearExamen');
        $this->middleware('can:ver-examenes')->only('lista');


    }

    public function lista(){
        $examenesPaciente=Examen::paginate(7);
        return view('sistema.examen_medico.examenes')->with(['objetos' => $examenesPaciente] ) ;
    }

    public function crearExamen(){

        return view('sistema.examen_medico.create');
    }
    public function verExamen($oidExamen){
        $examen=Examen::find($oidExamen);
        $tipoExamen=TipoExamen::find($examen->pk_tipo_examen);
        $objeto= new ExamenDTO();
        $objeto->pk_id_expediente=$examen->pk_id_expediente;
        $objeto->nombre_examen= $examen->nombre_examen;
        $objeto->nombre_tipo_examen=$tipoExamen->nombre_tipo_examen;
        $objeto->fecha_asignacion=$tipoExamen->fecha_asignacion;
        $objeto->fecha_resultado=$tipoExamen->fecha_resultado;
        $objeto->hora_resultados=$tipoExamen->hora_resultados;
        $objeto->observacion=$tipoExamen->observacion;

        return view('sistema.expediente.verExamen')->with(['objeto'=>$objeto]);        
    }
}
