<?php

namespace App\Http\Controllers;

use App\SignoVital;
use Illuminate\Http\Request;

class SignoVitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:ver_listado_signos')->only('index');
        $this->middleware('can:ver_listado_signos.create')->only('create', 'store');

    }

    public function index()
    {
        $signosvital=SignoVital::paginate(10);
        return view('sistema.Signo_Vital.lista')->with('signosvital',$signosvital) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.signo_vital.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoExam= new TipoExamen();
        $tipoExam->pk_tipo_examen=TipoExamen::count()+1;
        $tipoExam->nombre_tipo_exam= $request->get('nombre');
        $tipoExam->descripcion_tipo_exam= $request->get('descripcion');
        $tipoExam->precio=$request->get('precio');
        $tipoExam->save();
        return redirect('/tipo-examen');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoExamen::destroy($id);
        return redirect('/tipo-examen')->with('eliminar','ok');
    }
}