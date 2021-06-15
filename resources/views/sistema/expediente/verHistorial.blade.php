@extends('adminlte::page')
@section('content_header')
{{-- 
<h3></h3>
--}}
@endsection
@section('content')

<a class="btn btn-sm btn-dark" href="{{url('expediente/'.$objeto->oidExpediente.'')}}"  ><i class="fas fa-arrow-left"></i>Regresar</a>

<div class="row">
   <div class="col-md-12">
      <div class="card card-success">
         <div class="card-header">
            <h3 class="card-title">Diagnostico Médico</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" method="POST" >
               @csrf
               <!-- text input -->
               <div class="row">

                  <div class="col-3">
                     <div class="form-group">
                        <label>Tipo de Diagnostico</label>
                        <input type="text" disabled value="{{$objeto->nombreTipoDiagnostico}}"  id="nombre" name="nombre" class="form-control" >
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Fecha creado</label>
                        <input type="text" disabled value="{{ date("d/m/Y",strtotime($objeto->fecha))}}"  id="nombre" name="nombre" class="form-control">
                     </div>
                  </div>

                  <div class="col-3">
                     <div class="form-group">
                        <label>Hora creado</label>
                        <input type="text" value="{{ date("H:i:s",strtotime($objeto->hora))}}" disabled  id="telcontacto" name="telcontacto" class="form-control" >
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group">
                        <label>Observaciones </label>
                        <textarea disabled rows="3" style="min-width: 100%">{{$objeto->observaciones}} </textarea>
                     </div>
                  </div>
               </div>
               
               <hr/>

               <hr/>


            </form>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</div>
@endsection
