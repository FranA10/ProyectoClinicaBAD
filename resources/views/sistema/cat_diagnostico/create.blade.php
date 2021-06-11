@extends('adminlte::page')

@section('content_header')
    <h3>Crear categoria de diagnostico </h3>
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Diagnosticos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('cat_diagnostico')}}" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text"  id="Nombre" name="Nombre" class="form-control" placeholder="">
                          </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" id="Descripcion" name="Descripcion" class="form-control" placeholder="" >
                          </div>
                    </div>
                   
                    
                  <div class="col-4">
                    <label></label>
                    <button class="btn btn-success btn-lg btn-block" tabindex="4">Crear</button>
                  </div>
                  <div class="col-4">
                    <label></label>

                    <a type="button" href="{{ url('/cat_diagnostico')  }}" tabindex="5" class="btn btn-danger btn-lg btn-block"> Cancelar</a>

                    
                  </div>
                   
 
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection

  
  