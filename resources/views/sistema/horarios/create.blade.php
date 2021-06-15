@extends('adminlte::page')

@section('content_header')
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Horarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('horarios')}}" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{-- <label>Dia</label> --}}
                            <div class="form-group">
                                <label for="demo_overview" id="seleccion">Seleccione el dia</label>
                                  <select id="demo_overview" class="form-control" data-role="select-dropdown"  value = "select-dropdown" name="valor">
                                    <option selected>Seleccion</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miercoles">Miercoles</option>
                                    <option value="Jueves">Jueves</option>

                                    <option value="Viernes">Viernes</option>

                                    <option value="Sabado">Sabado</option>
                                    <option value="Domingo">Domingo</option>


                                </select>
                              </div>
                            {{-- <input type="time" id="HoraInicio" name="HoraInicio" class="form-control" placeholder="" > --}}
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label>Hora inicio</label>
                            <input type="time" id="HoraInicio" name="HoraInicio" class="form-control" placeholder="" >
                          </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                          <label>Hora fin</label>
                          <input type="time" id="HoraFin" name="HoraFin" class="form-control" placeholder="" >
                        </div>
                    </div>

                  <div class="col-3">
                    <label></label>
                    <button class="btn btn-success btn-lg btn-block" tabindex="4">Crear</button>
                  </div>
                  <div class="col-3">
                    <label></label>

                    <a type="button" href="{{ url('/horarios')  }}" tabindex="5" class="btn btn-danger btn-lg btn-block"> Cancelar</a>


                  </div>


                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>

  @endsection


