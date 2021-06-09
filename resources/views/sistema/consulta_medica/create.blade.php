@extends('adminlte::page')

@section('content_header')
    {{-- <h3>Nueva consulta </h3> --}}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">NUEVA CONSULTA</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    {{-- Aqui esta el formulario de la consulta --}}
                    <div class="col-12">
                        <form role="form" action="{{ url('historial_diagnostico')}}" method="POST" >
                            @csrf 
                            <!-- text input -->
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date"  id="fecha" name="fecha" class="form-control" placeholder="">
                                      </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Hora</label>
                                        <input type="time" id="hora" name="hora" class="form-control" placeholder="" >
                                      </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Area de consulta</label>
                                        <input type="text area" id="area" name="area" class="form-control" placeholder="" >
                                      </div>
                                  </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Consultado por</label>
                                        <input type="text area" id="consultado_por" name="consultado_por" class="form-control" placeholder="" >
                                      </div>
                                  </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Sintomatologia</label>
                                        <input type="text"  id="Sintomatologia" name="Sintomatologia" class="form-control" placeholder="">
                                      </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Examen fisico</label>
                                        <input type="text" id="examen" name="examen" class="form-control" placeholder="" >
                                      </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Pre diagnostico</label>
                                        <input type="text area" id="pre_diagnostico" name="pre_diagnostico" class="form-control" placeholder="" >
                                      </div>
                                  </div>
                                  <div class="col-3">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <input type="text area" id="observaciones" name="observaciones" class="form-control" placeholder="" >
                                      </div>
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
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Historial medico</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">otros</a>
                            </li>
                        </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-4">
                                        <label></label>
                                        <button class="btn btn-info  btn-block" tabindex="4">Agregar</button>
                                    </div>
                                        
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label></label>
                                            <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-4">
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
                                            <th></th>
                                            <th>Nombre</th>
                                            <th>Valor</th>
                                           
                                          </tr>
                                          {{-- @foreach($consulta_medica as $consulta) --}}
                                          <tr>
                                            {{-- <td>
                                              <form action="{{ route('historial_diagnostico.destroy', $historial->pk_diagnostico)}}" method="POST" class="eliminarRegistro">
                                                
                                                 @method('DELETE')
                                                 @csrf 
                                                <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button> 
                                                  <button type="submit" class="btn btn-danger btn-sm">
                                                      <i class="fas fa-trash-alt"></i>
                                                  </button>
                                              </form>
                                            </td> --}}
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            
                                          </tr>
                                          {{-- @endforeach --}}
                                        </table>
                                      </div>
                                </div>  
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                    </div>
                    </div>
                </div> 
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection

  
  