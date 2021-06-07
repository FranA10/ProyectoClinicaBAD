@extends('adminlte::page')

@section('content_header')
    <h3>Editar Tipo de Examen </h3>
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form"  action="{{ url('tipo-examen/'.$objeto->pk_tipo_examen.'/')}}" method="POST" >
                @csrf
                @method('PUT')
                <!-- text input -->
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" value="{{$objeto->nombre_tipo_exam}}" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Descripción</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{$objeto->descripcion_tipo_exam}}" placeholder="Enter ..." >
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Precio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                                </div>
                                <input type="number" id="precio" name="precio" step="0.01" min="0.00" value="{{$objeto->precio}}" class="form-control">

                              </div>
                          </div>
                    </div>
 
                </div>
<div class="row">
    <a class="btnt btn-dark btn-sm" href="{{ url('/tipo-examen')  }}" tabindex="5"> Cancelar</a>
    <button class="btn btn-primary btn-sm" tabindex="4">Actualizar</button>
</div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection