@extends('adminlte::page')

@section('content_header')
    {{-- <h3>Nueva consulta </h3> --}}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">CONSULTA</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    {{-- Aqui esta el formulario de la consulta --}}
                    <div class="col-12">
                      <form role="form"  action="{{ url('consulta_medica/'.$objeto->pk_consulta.'/')}}" method="POST" >
                        
                        @csrf 
                        @method('PUT')
                            <!-- text input -->
                            <div class="row">
                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="date"  id="fecha" value="{{$objeto->Fecha}}" name="fecha" class="form-control" placeholder="">
                                  </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="time" id="hora" name="hora" value="{{date("H:i:s",strtotime($objeto->hora))}}" class="form-control" placeholder="" >
                                      </div>
                                </div>
                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Area de consulta</label>
                                    <input type="text area" id="area" value="{{$objeto->area_consulta}}" name="area" class="form-control" placeholder="" >
                                  </div>
                                  </div>
                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Consultado por</label>
                                    <input type="text area" id="consultado_por" value="{{$objeto->consulta_por}}" name="consultado_por" class="form-control" placeholder="" >
                                  </div>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Sintomatologia</label>
                                    <input type="text"  id="Sintomatologia" value="{{$objeto->sintomatologia}}" name="Sintomatologia" class="form-control" placeholder="">
                                  </div>
                                </div>
                                
                                <div class="col-3">
                                  <div class="form-group">
                                    <label>Examen fisico</label>
                                    <input type="text" id="examen" name="examen" value="{{$objeto->exam_fisico}}" class="form-control" placeholder="" >
                                  </div>
                                </div>
                                <div class="col-3">
                                    
                                  <div class="form-group">
                                    <label>Pre diagnostico</label>
                                    <input type="text area" id="pre_diagnostico" value="{{$objeto->pre_diagnostico}}" name="pre_diagnostico" class="form-control" placeholder="" >
                                  </div>
                                  </div>
                                  <div class="col-3">
                                    <div class="form-group">
                                      <label>Indicaciones</label>
                                      <input type="text area" id="indicaciones" value="{{$objeto->indicaciones}}" name="indicaciones" class="form-control" placeholder="" >
                                    </div>
                                  </div>   
                            </div>
                            <div class="row">
                              <div class="col-3">
                                {{-- <label></label> --}}
                                <button class="btn btn-success  btn-block" tabindex="4">Actualizar</button>
                              </div>
                              <div class="col-3">
                                {{-- <label></label> --}}
            
                                <a type="button" href="{{ url('/consulta_medica')  }}" tabindex="5" class="btn btn-danger  btn-block"> Regresar</a>                    
                              </div>
                          </div>
                        </form>
                        <hr>
                    </div>
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Signos vitales</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Historial diagnosticos</a>
                            </li>
                           
                        </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="row">
                                <div class="col-3">
                                    <label></label>
                                    <button class="btn btn-info  btn-block" tabindex="4">Agregar</button>
                                </div>
                                    
                                <div class="col-3">
                                    <div class="form-group">
                                        <label></label>
                                        <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label></label>
                                        <input type="text"  id="valor" name="valor" class="form-control" placeholder="Valor">
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                      <tr>
                                        <th>Nombre</th>
                                        <th>Valor</th>
                                        <th></th>

                                      </tr>
                                     
                                      
                                      @foreach($objeto_signo as $signoVital)
                                      
                                      <tr>
                                        <td class="col-md-6">
                                          <input disabled type="text" value={{$signoVital->nombre_signo}}  id="hora" name="hora" class="form-control" placeholder="observaciones">

                                          </td>
                                        <td class="col-md-5">
                                          <input disabled  type="text" value={{$signoVital->valor_signo}}  id="hora" name="hora" class="form-control" placeholder="observaciones">
                                          </td>
                                        <td class="col-md-1">
                                           <a class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> 
                                        </td>

                                      </tr>
                                      @endforeach
                                      
                                    </table>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="row">
                                <div class="col-3">
                                    <label></label>
                                    <button class="btn btn-info  btn-block" tabindex="4">Agregar</button>
                                </div>
                                    
                                <div class="col-3">
                                    <div class="form-group">
                                        <label></label>
                                        <input type="text"  id="tipo" name="tipo" class="form-control" placeholder="tipo">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label></label>
                                        <input type="date"  id="fecha" name="fecha" class="form-control" placeholder="fecha">
                                    </div>
                                </div>
                                {{-- <div class="col-1">
                                  <div class="form-group">
                                      <label></label>
                                      <input type="time"  id="hora" name="hora" class="form-control" placeholder="hora">
                                  </div>
                              </div> --}}
                              <div class="col-3">
                                  <div class="form-group">
                                      <label></label>
                                      <input type="text"  id="observaciones" name="observaciones" class="form-control" placeholder="observaciones">
                                  </div>
                              </div>
                              </div>
                              <div class="row">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                      <tr>
                                      
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Observaciones</th>
                                        {{-- <th></th> --}}
                                      </tr>
                                     
                                      @foreach($objeto_diagnostico as $diagnostico)
                                      <tr>
                                        <td class="col-md-3">
                                          <input type="text"  id="hora" name="hora" class="form-control" placeholder="observaciones">
                                        </td>
                                        
                                        <td class="col-md-3">
                                          <input   type="date" enabled id="fecha" value= {{$diagnostico->fecha}} name="fecha" class="form-control" placeholder="observaciones">
                                        </td>
                                        <td class="col-md-3">
                                          <input type="time"  id="hora" name="hora" class="form-control" value={{date("H:i:s",strtotime($diagnostico->hora))}} placeholder="observaciones">
                                          </td>
                                        <td class="col-md-3">
                                          <input type="text"  id="observaciones" value= {{$diagnostico->observaciones}} name="observaciones" class="form-control" placeholder="observaciones">
                                          </td>
                                        {{-- <td>

                                        </td> --}}


                                      </tr>
                                      @endforeach
                                      
                                    </table>
                                  </div>
                              </div>
                            </div>
                           
                          </div>
                        
                    </div>
                    </div>
                </div> 
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

@endsection

  
  