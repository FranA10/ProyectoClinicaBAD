<?php

namespace App\Http\Controllers;

use App\AltaMedica;
use App\CatDiagnostico;
use App\ConsultaMedica;
use App\DatosPersonales;
use App\DTO\ExpedienteDTO;
use App\DTO\HistorialDiagnosticoDTO;
use App\Examen;
use App\Expediente;
use App\Familiar;
use App\HistorialDiagnostico;
use App\HistorialEnfermedad;
use App\Tratamiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpedienteController extends Controller
{

    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:ver-expedientes')->only('listar');
        $this->middleware('can:crear-expediente');

    }

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
        
        if($datosPersonales->empleado==1)
            $expDTO->esEmpleado=true;
        else
        $expDTO->esEmpleado=false;
        $expDTO->nombreResponsable=$familiar->nombre_1." ".$familiar->nombre_2." ".$familiar->apellido_1;
        $expDTO->contactoResponsable=$familiar->tel_contacto;
        $consultasMedicas=ConsultaMedica::where('pk_id_expediente','=',$expediente->pk_id_expediente)->get();


        $altasMedicas=AltaMedica::where('pk_id_expediente','=',$expediente->pk_id_expediente)->get();
        $examenes=Examen::where('pk_id_expediente','=',$expediente->pk_id_expediente)->get();
        
        $historialesDiagnostico=HistorialDiagnostico::where('pk_id_expediente','=',$expediente->pk_id_expediente)->get();
        $historiales=array();
        foreach($historialesDiagnostico as $hist){
            $nuevoHistDTO= new HistorialDiagnosticoDTO();
            $nuevoHistDTO->oid=$hist->pk_diagnostico;
            $nuevoHistDTO->fecha=$hist->fecha;
            $nuevoHistDTO->hora=$hist->hora;
            $nuevoHistDTO->observaciones=$hist->observaciones;
            $tipoDiagnostico=CatDiagnostico::find($hist->pk_cod_inter);
            $nuevoHistDTO->nombreTipoDiagnostico=$tipoDiagnostico->nombre_diagnostico;
            array_push($historiales,$nuevoHistDTO);
        }
        
        $historialEnfermedades=HistorialEnfermedad::where('pk_id_expediente','=',$expediente->pk_id_expediente)->get();
        return view('sistema.expediente.expediente')
        ->with(['objeto'=>$expDTO,'consultas'=>$consultasMedicas
        ,'altas'=>$altasMedicas,'examenes'=>$examenes,'histEnfermedades'=>$historialEnfermedades,'historialDiagnosticos'=>$historiales]);
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
       
       if($ultimo!=null)
       {
        $nuevoExpediente->pk_id_expediente=intval($ultimo->pk_id_expediente)+1;
       }else{
        $nuevoExpediente->pk_id_expediente=1; 
       }
       $nuevoExpediente->pk_num_personal=$request->get('sele') ;
        print_r($request->get('sele'));
       $nuevoExpediente->fecha_creacion=Carbon::now();
       $nuevoExpediente->resp_toma_datos="hola";
       $nuevoExpediente->save();
        return back()->with(['crear' => 'ok']);
    }

    public function verConsulta($oidConsulta){
        $consulta=ConsultaMedica::find($oidConsulta);
        return view('sistema.expediente.verConsulta')->with(['objeto'=>$consulta]);        
    }

    public function verAlta($oidAlta){
        $objeto=AltaMedica::find($oidAlta);
        return view('sistema.expediente.verAlta')->with(['objeto'=>$objeto]);        
    }


    public function verHistorial($oidHistorial){
        $diagnostico=HistorialDiagnostico::find($oidHistorial);
        $tipoDiagnostico= CatDiagnostico::find($diagnostico->pk_cod_inter);
        $objeto= new HistorialDiagnosticoDTO();
        $objeto->oid=$diagnostico->pk_diagnostico;
        $objeto->fecha=$diagnostico->fecha;
        $objeto->hora=$diagnostico->hora;
        $objeto->observaciones=$diagnostico->observaciones;
        $objeto->nombreTipoDiagnostico=$tipoDiagnostico->nombre_diagnostico;
        $objeto->oidExpediente=$diagnostico->pk_id_expediente;
        return view('sistema.expediente.verHistorial')->with(['objeto'=>$objeto]);        
    }

}
