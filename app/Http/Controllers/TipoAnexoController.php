<?php

namespace App\Http\Controllers;

use App\TipoAnexo;
use Illuminate\Http\Request;

class TipoAnexoController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function __construct()
    {   
        //$this->middleware('can:<<nombre del permiso>>')->only('<<nombre/s del metodo del controlador>>');
        $this->middleware('can:ver-tipos-anexo');

    }

   public function index()
   {
       $objetos=TipoAnexo::paginate(7);
       return view('sistema.tipo_anexo.lista')->with(['objetos' => $objetos]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('sistema.tipo_anexo.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $objeto= new TipoAnexo();
       $objeto->id_tipo_anexo=TipoAnexo::count()+1;
       $objeto->tipo_anexo= $request->get('nombre');

       $objeto->save();
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
       $objeto=TipoAnexo::find($id);
       return view('sistema.tipo_anexo.edit')->with('objeto',$objeto);
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
       $objeto= TipoAnexo::find($id);
       $objeto->tipo_anexo= $request->get('nombre');

       $objeto->save();
       return redirect('/tipo-anexo')->with('actualizar','ok');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
    TipoAnexo::destroy($id);
       return redirect('/tipo-anexo')->with('eliminar','ok');
   }
}