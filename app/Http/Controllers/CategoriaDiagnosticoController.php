<?php

namespace App\Http\Controllers;

use App\CatDiagnostico;
use Illuminate\Http\Request;

class CategoriaDiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_diagnostico = CatDiagnostico::paginate(5);
        return view('sistema.cat_diagnostico.lista')->with('cat_diagnostico',$cat_diagnostico);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.cat_diagnostico.create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoExamen::destroy($id);
        return redirect('/')->with('eliminar','ok');
    }
}