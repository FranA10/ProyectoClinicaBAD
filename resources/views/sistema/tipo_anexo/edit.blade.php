@extends('adminlte::page')

@section('content_header')
    <h3>Editar Tipo de Anexo </h3>
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
              <form role="form"  action="{{ url('tipo-anexo/'.$objeto->id_tipo_anexo.'/')}}" method="POST" >
                @csrf
                @method('PUT')
                <!-- text input -->
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" value="{{$objeto->tipo_anexo}}" placeholder="Enter ...">
                          </div>
                    </div>


 
                </div>
<div class="row">
    <a class="btnt btn-dark btn-sm" href="{{ url('/tipo-anexo')  }}" tabindex="5"> Cancelar</a>
    <button class="btn btn-primary btn-sm" tabindex="4">Actualizar</button>
</div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection