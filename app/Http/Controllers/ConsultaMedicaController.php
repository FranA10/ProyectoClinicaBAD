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
        $consulta_medica = ConsultaMedica::paginate(5);
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
        $categoria= new CatDiagnostico();
        $categoria->pk_cod_inter=CatDiagnostico::count()+1;
        
   
        $categoria->nombre_diagnostico=$request->get('Nombre');
        $categoria->descripcion=$request->get('Descripcion');

        $categoria->save();
        return redirect('/cat_diagnostico');
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