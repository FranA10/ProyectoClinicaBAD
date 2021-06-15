@extends('adminlte::page')

@section('content_header')
    {{-- <h3>Cita medica </h3> --}}
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Modificar cita medica</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('citas_medicas/'.$objeto->pk_cita_medica.'/')}}" method="POST" >
                @csrf
                @method('PUT')
                <!-- text input -->
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Numero cita</label>
                            <input disabled type="text"  value={{$objeto->pk_cita_medica}} id="Nombre" name="Nombre" class="form-control" placeholder="">
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
                          <label for="demo_overview" id="seleccion">Horarios</label>
                          <select id="demo_overview" class="form-control" data-role="select-dropdown"  value = "select-dropdown" name="valor">
                            <option selected>Seleccion</option>
                            
                            @foreach($horarios as $horario)
                            <option value="{{$horario->pk_horario}}">{{$horario->dia_semana.'    '}}{{date("H:i:s",strtotime($horario->hora_inicio.'    '))}}{{date("H:i:s",strtotime($horario->hora_fin.'    '))}}</option>
                          @endforeach
                        </select>    
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="date" value={{$objeto->fecha_cita_medica}} id="fecha" name="fecha" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Hora</label>
                            <input type="time" id="hora" value ={{date("H:i:s",strtotime($objeto->hora_cita))}} name="hora" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Observaciones</label>
                            <input type="text-area" value={{$objeto->observaciones_cita}} id="observaciones" name="observaciones" class="form-control"   >
                          </div>
                    </div>
                   
                    
                  <div class="col-4">
                    <label></label>
                    <button class="btn btn-success btn-lg btn-block" tabindex="4">Actualizar</button>
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

  
  