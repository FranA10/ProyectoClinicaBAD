<?php

namespace App\Http\Controllers;

use App\DatosPersonales;
use App\DTO\ExpedienteDTO;
use App\Expediente;
use App\Familiar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{

    public function listar(){
        $expedientes=Expediente::paginate(8);
        $objetos= array();
       foreach($expedientes as $exp){
        $expDTO= new ExpedienteDTO();
        $expDTO->oid=$exp->pk_id_expediente;
        $datoPersonal= DatosPersonales::find($exp->pk_num_personal);
        $expDTO->oidDatosPersonales=$datoPersonal->pk_num_personal;
        $expDTO->nombrePaciente=$datoPersonal->nombre_1." ".$datoPersonal->nombre_2." ".$datoPersonal->apellido_1;
        $expDTO->dui=$datoPersonal->dui;
        $expDTO->fechaModificacion=$exp->fecha_modificacion;

        array_push($objetos,$expDTO);
       }
        return view('sistema.expediente.lista')->with(['objetos'=>$objetos]);
    }

    public function getFamiliar($pk_num_personal){
        $familiar=DB::table('familiar')
        ->join('es_familiar_de','familiar.pk_familiar','=','es_familiar_de.pk_familiar')
        ->join('datos_personales','es_familiar_de.pk_num_personal','=','datos_personales.pk_num_personal')
        ->where([
            ['familiar.responsable','=','1'],
            ['datos_personales.pk_num_personal','=',$pk_num_personal]
        ])->select('familiar.*')
        ->get()->first();   
return $familiar;
    }

    public function expediente($oidExpediente){

        $expediente=Expediente::find($oidExpediente);
        $datosPersonales=DatosPersonales::find($expediente->pk_num_personal);

        $expDTO= new ExpedienteDTO();
        $expDTO->oid=$expediente->pk_id_expediente;
        $expDTO->nombrePaciente=$datosPersonales->nombre_1." ".$datosPersonales->nombre_2." ".$datosPersonales->apellido_1;
        $expDTO->fechaModificacion=$expediente->fecha_modificacion;
        $expDTO->fechaCreacion=$expediente->fecha_creacion;
        $expDTO->telefono=$datosPersonales->tel_contacto;
        $familiar=$this->getFamiliar($expediente->pk_num_personal);
        $expDTO->nombreResponsable=$familiar->nombre_1." ".$familiar->nombre_2." ".$familiar->apellido_1;
        $expDTO->contactoResponsable=$familiar->tel_contacto;
        return view('sistema.expediente.expediente')->with(['objeto'=>$expDTO]);
    }

    public function mostrarCrear(){
        $objetos= DB::table('datos_personales')
        ->leftJoin('expediente','datos_personales.pk_num_personal','=','expediente.pk_num_personal')
        ->whereNull('expediente.pk_num_personal')
        ->select('datos_personales.*')
        ->get();

        return view('sistema.expediente.crear')->with(['objetos'=>$objetos]);
    }

    public function obtenerDatosPersonales(Request $request){
        $objeto=DatosPersonales::find($request->pk);
        $familiar=$this->getFamiliar($request->pk);
        
        return response()->json(['responsable'=>$familiar->nombre_1." ".$familiar->nombre_2." ".$familiar->apellido_1,'telResponsable'=>$familiar->tel_contacto ,'success'=>true, 'data'=>$objeto]);

    }

    public function crearExpediente(Request $request){
       $nuevoExpediente= new Expediente();
       $ultimo=Expediente::latest('pk_id_expediente')->first();
       $nuevoExpediente->pk_id_expediente=intval($ultimo->pk_id_expediente)+1;
       $nuevoExpediente->pk_num_personal=$request->get('sele') ;
        print_r($request->get('sele'));
       $nuevoExpediente->fecha_creacion=Carbon::now();
       $nuevoExpediente->resp_toma_datos="hola";
       $nuevoExpediente->save();
        return back()->with(['crear' => 'ok']);
    }
}
