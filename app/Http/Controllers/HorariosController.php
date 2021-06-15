<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:ver_horarios')->only('index');
        $this->middleware('can:ver_horarios.create')->only('create', 'store');

    }

    public function index()
    {
        $horarios=Horario::paginate(8);
        return view('sistema.horarios.lista')->with('horarios',$horarios) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.horarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horario= new Horario();
        $horario->pk_horario=Horario::count()+1;
        // $horario->hora=Carbon::parse( $request->get('hora'));
        $horario->hora_inicio=Carbon::parse( $request->get('HoraInicio'));
        $horario->hora_fin=Carbon::parse( $request->get('HoraFin'));

        $horario->dia_semana= ($request->get('valor'));
        
        $horario->estado_horario='ACTIVO';
        $horario->save();
        return redirect('/horarios');
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