<?php

namespace App\Http\Controllers;

use App\HistorialDiagnostico;
use Illuminate\Http\Request;

class HistorialDiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hist_diagnostico=HistorialDiagnostico::paginate(20);
        return view('sistema.historial_diagnostico.lista')->with('hist_diagnostico',$hist_diagnostico) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.historial_diagnostico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diagnostico= new HistorialDiagnostico();
        $diagnostico->pk_diagnostico=HistorialDiagnostico::count()+1;
        
        $diagnostico->fecha= ($request->get('fecha'));
        // $diagnostico->hora= $request->get('hora');
        $diagnostico->observaciones=$request->get('observaciones');
        $diagnostico->save();
        return redirect('/historial_diagnostico');
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
        HistorialDiagnostico::destroy($id);
        return redirect('/historial_diagnostico')->with('eliminar','ok');
    }
}