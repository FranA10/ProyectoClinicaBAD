@extends('adminlte::page')

@section('content_header')
    <h3>Crear nuevo Examen</h3>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Nuevo Examen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nombre examen</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tipo examen</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Fecha asignación</label>
                            <input type="date"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Fecha resultados</label>
                            <input type="date"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Observación</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                          </div>
                    </div>
                </div>
                <div class="row"> 

                    <div class="col-12">
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Valores del Examen</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Anexos</a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body">
                              <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">

                                    <div class="row">
                                        <div class="col-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Nombre</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Nombre">
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Valor</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Ingrese un valor">
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <button type="button" class="btn btn-block btn-primary">Agregar</button>
                                        </div>
                                      </div>
<hr/>
<div class="row">
    <div class="col-12">

        <table class="table table-hover">
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Valor</th>
            </tr>
            <tr>
              <td>
                  <a class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i>Ver</a> 
                </td>
              <td>Nombre 1</td>
              <td>25 sdsfsdlfd</td>

            </tr>
      
            <tr>
                <td>
                    <a class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i>Ver</a> 
                  </td>
                <td>Nombre 1</td>
                <td>25 sdsfsdlfd</td>
  
              </tr>
              <tr>
                <td>
                    <a class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i>Ver</a> 
                  </td>
                <td>Nombre 1</td>
                <td>25 sdsfsdlfd</td>
  
              </tr>
          
          </table>

    </div>
</div>


                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                                    </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                  
                                    <div class="row">

                                        <div class="col-2">

                                            <span class="btn btn-success col fileinput-button dz-clickable">
                                                <i class="fas fa-plus"></i>
                                                <span>Add files</span>
                                              </span>

                                        </div>

                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Tipo Anexo</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Nombre">
                                            </div>
                                        </div>


                                        <div class="col-2">
                                            <button type="button" class="btn btn-block btn-success">Agregar</button>
                                        </div>


                                      </div>  
                                 
                                </div>
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
