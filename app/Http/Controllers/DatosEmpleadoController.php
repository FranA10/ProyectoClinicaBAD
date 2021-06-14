<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatosPersonales;
use GuzzleHttp\Psr7\Message;

class DatosEmpleadoController extends Controller
{
    public function MostrarEmpleados(){
        return View('sistema/datos_emp/listar');
    }

    public function FormEmp(){
        return View('sistema/datos_emp/create');
    }

    public function FormPac(){
        return View('sistema/datos_pac/create');
    }

    //Guardar Empleado
    public function savePerson(Request $request){
       
       /* $request->validate([
            'pk_estado_civil' => 'required',
            'pk_ciudad' => 'required',
          ]);*/

          $request->validate([
            'nombre1' => 'required'
        ]);

        try {
            $persona= new DatosPersonales();
            $persona->pk_num_personal=DatosPersonales::count()+1;
            $persona->pk_estado_civil='1';//$request->get('nombre1');
            $persona->pk_ciudad=$request->get('idPais');
            $persona->pk_centro='1';
            $persona->pk_profesion=$request->get('idprofesion');
            $persona->pk_codsangre='1';//$request->get('idtsangre');
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
            $persona->correo = $request->get('idcorreo');
            $persona->clave = '12345';
            $persona->estado=0;
            $persona->usr_modify='prueba';//$request->get('
            $persona->save();

            return redirect()->back()
                ->with('success', 'Created successfully!');

        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }


       
       //return redirect('/FormularioEmpleado');
    
        //return back()->with('clavePersonsave','Registro almacenado correctamente');
}
}