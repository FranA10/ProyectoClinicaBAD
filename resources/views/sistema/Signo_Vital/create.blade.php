@extends('adminlte::page')

@section('content_header')
    <h3>Crear signo vital </h3>
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">SIGNOS VITALES</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('tipo-examen')}}" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Pulso</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Temperatura</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Enter ..." >
                          </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                          <label>Talla</label>
                          <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                          <label>Peso</label>
                          <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                        </div>
                  </div>
                  <div class="col-4">
                      <div class="form-group">
                          <label>Estatura</label>
                          <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Enter ..." >
                        </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                        <label>Presion arterial</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Enter ..." >
                      </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                        <label>Presion arterial</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Enter ..." >
                      </div>
                  </div>
                  
                  <div class="col-4">
                    <label></label>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Crear</button>
                    {{-- <a class="btnt btn-dark btn-sm" href="{{ url('/tipo-examen')  }}" tabindex="5"> Cancelar</a> --}}
                  </div>
                  <div class="col-4">
                    <label></label>
                    <button type="button" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                    {{-- <button class="btn btn-primary btn-sm" tabindex="4">Crear</button> --}}
                  </div>
                   
 
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection