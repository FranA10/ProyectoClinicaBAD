@extends('adminlte::page')
@section('content_header')
{{-- 
<h3></h3>
--}}
@endsection
@section('content')

<a class="btn btn-sm btn-dark" href="{{url('expedientes')}}" ><i class="fas fa-arrow-left"></i>Regresar</a>

<div class="row">
   <div class="col-md-12">
      <div class="card card-success">
         <div class="card-header">
            <h3 class="card-title">Expediente Médico</h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" method="POST" >
               @csrf
               <!-- text input -->
               <div class="row">
                  <div class="col-3">
                     <div class="form-group">
                        <label>Paciente</label>
                        <input type="text" disabled  id="nombre" name="nombre" class="form-control" value="{{$objeto->nombrePaciente}} ">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Fecha creación</label>
                        <input type="text" disabled  id="nombre" name="nombre" class="form-control" value="{{$objeto->fechaCreacion}}">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Ultima Modificación</label>
                        <input type="text" disabled  id="nombre" name="nombre" class="form-control" value="{{$objeto->fechaModificacion}}">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Es Empleado</label>
                        <label class=" form-control">
@if($objeto->esEmpleado)
<input type="checkbox" disabled checked>
@else
<input type="checkbox" disabled>
@endif
                        </label>
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Telefono contacto</label>
                        <input type="text" disabled  id="nombre" name="nombre" class="form-control" value="{{$objeto->telefono}}">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label>Nombre de Responsable</label>
                        <input type="text" disabled id="nombre" name="nombre" class="form-control" value="{{$objeto->nombreResponsable}}">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Conctacto de Responsable</label>
                        <input type="text" disabled  id="nombre" name="nombre" class="form-control" value="{{$objeto->contactoResponsable}}">
                     </div>
                  </div>
               </div>
               <hr/>
               <div class="row">
                <div class="col-12">
                   <div class="card card-primary card-outline card-tabs">
                      <div class="card-header p-0 pt-1 border-bottom-0">
                         <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                               <a class="nav-link active" id="idConsultas-tab" data-toggle="pill" href="#idConsultas" role="tab" aria-controls="idConsultas" aria-selected="true">Consultas Médicas</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" id="idAltas-tab" data-toggle="pill" href="#idAltas" role="tab" aria-controls="idAltas" aria-selected="false">Altas Médicas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="idExamenes-tab" data-toggle="pill" href="#idExamenes" role="tab" aria-controls="idExamenes" aria-selected="false">Examenes</a>
                             </li>
                             <li class="nav-item">
                                <a class="nav-link" id="idTratamientos-tab" data-toggle="pill" href="#idTratamientos" role="tab" aria-controls="idTratamientos" aria-selected="false">Historial Diagnosticos</a>
                             </li>
                             {{-- <li class="nav-item">
                                <a class="nav-link" id="idHistorial-tab" data-toggle="pill" href="#idHistorial" role="tab" aria-controls="idHistorial" aria-selected="false">Historial-Enfermedades</a>
                             </li> --}}
                         </ul>
                      </div>
                      <div class="card-body">
                         <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade active show" id="idConsultas" role="tabpanel" aria-labelledby="idConsultas-tab">
                                {{-- <div class="row"><button class="btn btn-success"><i class="fas fa-plus"></i> </button> </div> --}}
                                <br>
                               <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover">
                                       <tr>
                                          <th>Area Consulta</th>
                                          <th>Fecha</th>
                                          <th>Hora</th>
                                          <th>Indicaciones</th>
                                          <th>Sintomatologia</th>
                                          <th>Consulta por</th>

                                          <th>#</th>

                                       </tr>
                                       @if($consultas!=null)
                                       @foreach($consultas as $consulta)
                                       <tr>

                                          <td>{{$consulta->area_consulta}}</td>
                                          <td>{{ date("d/m/Y",strtotime($consulta->fecha))}}</td>
                                          <td>{{ date("H:i:s",strtotime($consulta->hora))}}</td>
                                          <td>{{$consulta->indicaciones}}</td>
                                          <td>{{$consulta->sintomatologia}}</td>
                                          <td>{{$consulta->consulta_por}}</td>
                                          <td>
                                             <a class="btn btn-warning btn-sm" href="{{url('ver_consulta/'.$consulta->pk_consulta.'')}}" ><i class="fas fa-eye"></i>Ver</a> 
                                          </td>
                                       </tr>
                                       @endforeach
                                       @endif
                                    </table>
                                 </div>
                               </div>
                            </div>
                            <div class="tab-pane fade" id="idAltas" role="tabpanel" aria-labelledby="idAltas-tab">
                                {{-- <div class="row"><button class="btn btn-success"><i class="fas fa-plus"></i> </button> </div> --}}
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                       <table class="table table-hover">
                                          <tr>
                                             <th>Fecha</th>
                                             <th>Hora</th>
                                             <th>Indicaciones</th>
                                             <th>#</th>

                                          </tr>
                                          @if($altas!=null)
                                          @foreach($altas as $alta)
                                          <tr>
   
                                             <td>{{ date("d/m/Y",strtotime($alta->fecha))}}</td>
                                             <td>{{ date("H:i:s",strtotime($alta->hora))}}</td>
                                             <td>{{$alta->indicaciones}}</td>

                                             <td>
                                                <a class="btn btn-warning btn-sm" href="{{url('ver_alta/'.$alta->pk_alta.'')}}" ><i class="fas fa-eye"></i>Ver</a> 
                                             </td>
                                          </tr>
                                          @endforeach
                                          @endif
                                       </table>
                                    </div>
                                 </div>
                            </div>


                            <div class="tab-pane fade" id="idExamenes" role="tabpanel" aria-labelledby="idExamenes-tab">
                                <div class="row"><a class="btn btn-success" href="{{url('crear_examen/')}}" ><i class="fas fa-plus"></i> </a> </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover">
                                           <tr>
                                              <th>Nombre Examen</th>
                                              <th>Fecha Asignacion</th>
                                              <th>Fecha Recibido</th>
                                              <th>Hora Recibido</th>
                                              <th>Observacioness</th>
                                              <th>#</th>
 
                                           </tr>
                                           @if($examenes!=null)
                                           @foreach($examenes as $exam)
                                           <tr>
    
                                              <td>{{$exam->nombre_examen}}</td>
                                              <td>{{ date("d/m/Y",strtotime($exam->fecha_asignacion))}}</td>
                                              <td>{{ date("d/m/Y",strtotime($exam->fecha_resultado))}}</td>
                                              <td>{{ date("H:i:s",strtotime($exam->hora_resultado))}}</td>
    
                                              <td>{{$exam->observacion}}</td>
                                              <td>
                                                 <a class="btn btn-warning btn-sm" href="{{url('ver_examen/'.$exam->pk_examen.'')}}" ><i class="fas fa-eye"></i>Ver</a> 
                                              </td>
                                           </tr>
                                           @endforeach
                                           @endif
                                        </table>
                                     </div>
                                 </div>
                             </div>

                            <div class="tab-pane fade" id="idTratamientos" role="tabpanel" aria-labelledby="idTratamientos-tab">
                                {{-- <div class="row"><button class="btn btn-success"><i class="fas fa-plus"></i> </button> </div> --}}
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover">
                                           <tr>
                                              <th>Tipo Diagnostico </th>
                                              <th>Fecha</th>
                                              <th>Hora</th>
                                              <th>Observaciones</th>
                                              <th>#</th>
 
                                           </tr>
                                           @if($historialDiagnosticos!=null)
                                           @foreach($historialDiagnosticos as $trat)
                                           <tr>
    
                                              <td>{{$trat->nombreTipoDiagnostico}}</td>
                                              <td>{{ date("d/m/Y",strtotime($trat->fecha))}}</td>
                                              <td>{{ date("H:i:s",strtotime($trat->hora))}}</td>
                                              <td>{{$trat->observaciones}}</td>
                                              <td>
                                                 <a class="btn btn-warning btn-sm" href="{{url('ver_diagnostico/'.$consulta->pk_consulta.'')}}" ><i class="fas fa-eye"></i>Ver</a> 
                                              </td>
                                           </tr>
                                           @endforeach
                                           @endif
                                        </table>
                                     </div>
                                 </div>
                             </div>


                             {{-- <div class="tab-pane fade" id="idHistorial" role="tabpanel" aria-labelledby="idHistorial-tab">
                                <div class="row"><button class="btn btn-success"><i class="fas fa-plus"></i> </button> </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover">
                                           <tr>
                                              <th>Ingreso</th>
                                              <th>Fecha</th>
                                              <th>Hora</th>
                                              <th>Indicaciones</th>
                                              <th>#</th>
 
                                           </tr>
                                           @if($histEnfermedades!=null)
                                           @foreach($histEnfermedades as $historial)
                                           <tr>
    
                                              <td>Nombre 1</td>
                                              <td>Nombre 1</td>
                                              <td>Nombre 1</td>
    
                                              <td>25 sdsfsdlfd</td>
                                              <td>
                                                 <a class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i>Ver</a> 
                                              </td>
                                           </tr>
                                           @endforeach
                                           @endif
                                        </table>
                                     </div>
                                 </div>
                             </div> --}}



                         </div>
                      </div>
                      <!-- /.card -->
                   </div>
                </div>
             </div>




            </form>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
</div>
@endsection