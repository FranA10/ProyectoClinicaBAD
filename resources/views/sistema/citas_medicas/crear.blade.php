@extends('adminlte::page')

@section('content_header')
    {{-- <h3>Cita medica </h3> --}}
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Citas medicas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('citas_medicas')}}" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Numero cita</label>
                            <input disabled type="text"  id="Nombre" name="Nombre" class="form-control" placeholder="">
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Numero consulta</label>
                            <input disabled  type="text" id="Descripcion" name="Descripcion" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input disabled  type="text" id="Descripcion" name="Descripcion" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Horario</label>
                            <input type="text" id="Descripcion" name="Descripcion" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="date" id="fecha" name="fecha" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Hora</label>
                            <input type="time" id="hora" name="hora" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Observaciones</label>
                            <input type="text" id="observaciones" name="observaciones" class="form-control" placeholder="" >
                          </div>
                    </div>
                   
                    
                  <div class="col-4">
                    <label></label>
                    <button class="btn btn-success btn-lg btn-block" tabindex="4">Guardar</button>
                  </div>
                  <div class="col-4">
                    <label></label>

                    <a type="button" href="{{ url('/citas_medicas')  }}" tabindex="5" class="btn btn-danger btn-lg btn-block"> Cancelar</a>

                    
                  </div>
                   
 
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection

  
  