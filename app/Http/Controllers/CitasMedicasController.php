<?php

namespace App\Http\Controllers;

use App\CitaMedica;
use App\SignoVital;
use App\HistorialDiagnostico;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasMedicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas_medica = CitaMedica::paginate(10);
        return view('sistema.citas_medicas.lista')->with('citas_medica',$citas_medica);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.citas_medicas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cita= new CitaMedica();
        $cita->pk_cita_medica=CitaMedica::count()+1;
        
   
        $cita->fecha_cita_medica=$request->get('fecha');
        $cita->hora_cita=$request->get('hora');
        $cita->observaciones_cita=$request->get('observaciones');



        
        $cita->save();
        return redirect('/citas_medicas');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objeto=CitaMedica::find($id);
       
        return view('sistema.citas_medicas.edit')->with('objeto',$objeto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request, $id)
    {
        $cita= CitaMedica::find($id);
        
   
        $cita->fecha_cita_medica=$request->get('fecha');
        $cita->hora_cita=$request->get('hora');
        $cita->observaciones_cita_medica=$request->get('observaciones');
   
  



        
        $cita->save();
        
        return redirect('/citas_medicas')->with('Actualizar','ok');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CitaMedica::destroy($id);
        return redirect('/citas_medicas')->with('eliminar','ok');
    }



    
    /**
     * Show the form for editing the specified resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function vistaBD()
    {
       // $resultado= DB::select('select * from expediente');
         $resultado= DB::select('EXEC CREARCONSULTAS');
        $citas_medica = CitaMedica::paginate(10);
        return response()->json(['ejecutado' => 'Script ejecutado con éxito', 'citas_medicas'=>$citas_medica]);

        
    }
}