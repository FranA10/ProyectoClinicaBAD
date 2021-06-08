@extends('adminlte::page')

@section('content_header')
    <h3>Crear anexo </h3>
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ANEXOS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('anexos')}}" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Direccion fisica</label>
                            <input type="text"  id="direccion" name="direccion" class="form-control" placeholder="">
                          </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="" >
                          </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                          <label>Tipo</label>
                          <input type="text" id="tipo" name="tipo" class="form-control" placeholder="" >
                        </div>
                    </div>
                    
                  <div class="col-4">
                    <label></label>
                    
                    <a type="button" class="btn btn-success btn-lg btn-block"> Crear</a>

                  </div>
                  <div class="col-4">
                    <label></label>
                    <a type="button" href="{{ url('/anexos')  }}" tabindex="5" class="btn btn-danger btn-lg btn-block"> Cancelar</a>

                    
                  </div>
                   
 
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection