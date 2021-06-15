<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatosPersonales;
use App\EstadoCivil;
use App\Genero;
use App\Pais;
use App\Profesion;
use App\TipoSangre;
use App\CentroHospitalario;
use App\Mail\EmergencyCallReceived;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Psr7\Message;

class DatosEmpleadoController extends Controller
{

   /* public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:ListDE')->only('MostrarEmpleados');
        $this->middleware('can:FormDE')->only('FormEmp', 'savePerson');
        $this->middleware('can:FormDE')->only('FormPac', 'savePerson');


    }*/
    
    public function MostrarEmpleados(){
        $persona= DatosPersonales::where("empleado","=","1")->get();

        return View('sistema/datos_emp/listar')->with(['persona'=>$persona]);
    }

    public function FormEmp(){
        $catEstadocivil = EstadoCivil::paginate(2);
        $catGenero = Genero::paginate(2);
        $catPais = Pais::paginate(5);
        $catProfesion = Profesion::where("estado","=","1")->get();
        $catTSangre = TipoSangre::all();
        $catCentro =  CentroHospitalario::all();
        return View('sistema/datos_emp/create')->with(['catGenero'=>$catGenero, 'catEstadoc'=>$catEstadocivil, 'catPais'=>$catPais, 'catProfesion'=>$catProfesion,
        'catTSangre'=>$catTSangre,'catCentro'=>$catCentro]);
    }

    public function FormPac(){
        $catEstadocivil = EstadoCivil::paginate(2);
        $catGenero = Genero::paginate(2);
        $catPais = Pais::paginate(5);
        $catProfesion = Profesion::where("estado","=","1")->get();;
        $catTSangre = TipoSangre::all();
        $catCentro =  CentroHospitalario::all();
        return View('sistema/datos_pac/create')->with(['catGenero'=>$catGenero, 'catEstadoc'=>$catEstadocivil, 'catPais'=>$catPais, 'catProfesion'=>$catProfesion,
        'catTSangre'=>$catTSangre,'catCentro'=>$catCentro]);
    }

    //Guardar Empleado
    public function savePerson(Request $request){

          $request->validate([
            'nombre1' => 'required',
            'apellido1'=> 'required',
            'idPais' => 'required',
            'idcentroH' => 'required',
            'idEstadoC' => 'required',
            'idprofesion' => 'required',
            'idtsangre' => 'required',
            'idGenero' => 'required',
            'idfnacimiento' => 'required',


        ]);

        try {
            $passCode = uniqid();
            $email = $request->get('idcorreo');

            $persona= new DatosPersonales();
            $persona->pk_num_personal=DatosPersonales::count()+1;
            $persona->pk_estado_civil=$request->get('idEstadoC');
            $persona->pk_ciudad=$request->get('idPais');
            $persona->pk_centro=$request->get('idcentroH');
            $persona->pk_profesion=$request->get('idprofesion');
            $persona->pk_codsangre=$request->get('idtsangre');
            $persona->pk_genero=$request->get('idGenero');
            $persona->nombre_1=$request->get('nombre1');
            $persona->nombre_2=$request->get('nombre2');
            $persona->apellido_1=$request->get('apellido1');
            $persona->apellido_2=$request->get('apellido2');
            $persona->apellido_matrimonio=$request->get('apellidoc');
            $persona->dui=$request->get('iddoc');
            $persona->nit=$request->get('idnit');
            $persona->empleado=1;
            $persona->pasaporte=$request->get('idpasaporte');
            $persona->licencia_conducir=$request->get('idLicencia');
            $persona->licencia_medica=$request->get('idLicMed');
            $persona->fecha_nacimiento='01/05/2021';//$request->get('idfnacimiento');
            $persona->tel_contacto=$request->get('idTel');
            $persona->direccion=$request->get('iddireccion');
            $persona->correo = $email;
            $persona->clave = bcrypt($passCode);
            $persona->estado=1;
            $persona->usr_modify=auth()->id();
            $persona->save();

            $vdatos= new \stdClass();
            $vdatos->usr = $email;
            $vdatos->pass = $passCode;
            Mail::to($email)->send(new EmergencyCallReceived($vdatos));

            return redirect()->back()
                ->with('success', 'Created successfully!');

        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
}
    //Guardar Paciente
    public function savePaciente(Request $request){

    $request->validate([
      'nombre1' => 'required',
      'apellido1'=> 'required',
      'idPais' => 'required',
      'idcentroH' => 'required',
      'idEstadoC' => 'required',
      'idprofesion' => 'required',
      'idtsangre' => 'required',
      'idGenero' => 'required',
      'idfnacimiento' => 'required',
  ]);

  try {
      $passCode = uniqid();
      $email = $request->get('idcorreo');

      $persona= new DatosPersonales();
      $persona->pk_num_personal=DatosPersonales::count()+1;
      $persona->pk_estado_civil=$request->get('idEstadoC');
      $persona->pk_ciudad=$request->get('idPais');
      $persona->pk_centro=$request->get('idcentroH');
      $persona->pk_profesion=$request->get('idprofesion');
      $persona->pk_codsangre=$request->get('idtsangre');
      $persona->pk_genero=$request->get('idGenero');
      $persona->nombre_1=$request->get('nombre1');
      $persona->nombre_2=$request->get('nombre2');
      $persona->apellido_1=$request->get('apellido1');
      $persona->apellido_2=$request->get('apellido2');
      $persona->apellido_matrimonio=$request->get('apellidoc');
      $persona->dui=$request->get('iddoc');
      $persona->nit=$request->get('idnit');
      $persona->empleado=0;
      $persona->pasaporte=$request->get('idpasaporte');
      $persona->licencia_conducir=$request->get('idLicencia');
      $persona->fecha_nacimiento='01/05/2021';//$request->get('idfnacimiento');
      $persona->tel_contacto=$request->get('idTel');
      $persona->direccion=$request->get('iddireccion');
      $persona->correo = $request->get('idcorreo');
      $persona->clave = bcrypt($passCode);
      $persona->estado=1;
      $persona->usr_modify=auth()->id();
      $persona->save();
    
      $vdatos= new \stdClass();
      $vdatos->usr = $email;
      $vdatos->pass = $passCode;
      Mail::to($email)->send(new EmergencyCallReceived($vdatos));

      return redirect()->back()
          ->with('success', 'Created successfully!');

  } catch (\Exception $e){
      return redirect()->back()
          ->with('error', 'Error during the creation!');
  }
}   
}