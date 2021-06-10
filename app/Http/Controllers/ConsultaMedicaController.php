<?php

namespace App\Http\Controllers;

use App\ConsultaMedica;
use Illuminate\Http\Request;

class ConsultaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta_medica = ConsultaMedica::paginate(10);
        return view('sistema.consulta_medica.lista')->with('consulta_medica',$consulta_medica);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.consulta_medica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consulta= new ConsultaMedica();
        $consulta->pk_consulta=ConsultaMedica::count()+1;
        
   
        $consulta->fecha=$request->get('fecha');
        $consulta->area_consulta=$request->get('area');
        $consulta->indicaciones=$request->get('indicaciones');
        $consulta->pre_diagnostico=$request->get('pre_diagnostico');
        $consulta->sintomatologia=$request->get('Sintomatologia');
        $consulta->exam_fisico=$request->get('examen');
        $consulta->consulta_por=$request->get('consultado_por');



        
        $consulta->save();
        return NULL;
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CatDiagnostico::destroy($id);
        return redirect('/cat_diagnostico')->with('eliminar','ok');
    }
}