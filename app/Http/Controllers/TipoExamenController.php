<?php

namespace App\Http\Controllers;

use App\TipoExamen;
use Illuminate\Http\Request;

class TipoExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:ver-tipos-examen');

    }
    public function index()
    {
        $tiposexam=TipoExamen::paginate(7);
        return view('sistema.tipo_examen.lista')->with(['tiposexam' => $tiposexam] ) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.tipo_examen.create');
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
        return back()->with(['crear' => 'ok']);
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
        $objeto=TipoExamen::find($id);
        return view('sistema.tipo_examen.edit')->with('objeto',$objeto);
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
        $tipoExam= TipoExamen::find($id);
        $tipoExam->nombre_tipo_exam= $request->get('nombre');
        $tipoExam->descripcion_tipo_exam= $request->get('descripcion');
        $tipoExam->precio=$request->get('precio');
        $tipoExam->save();
        return redirect('/tipo-examen')->with('actualizar','ok');
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