@extends('adminlte::page')

@section('content_header')
    <h3>Crear Tipo de Examen </h3>
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Nuevo Tipo de Examen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('tipo-examen')}}" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label>Descripción</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Enter ..." >
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Precio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                                </div>
                                <input type="number" id="precio" name="precio" step="0.01" min="0.00" class="form-control">

                              </div>
                          </div>
                    </div>
 
                </div>
<div class="row">
    <a class="btnt btn-dark btn-sm" href="{{ url('/tipo-examen')  }}" tabindex="5"> Cancelar</a>
    <button class="btn btn-primary btn-sm" tabindex="4">Crear</button>
</div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection

  
  @section('ccs')
<link rel="stylesheet" href="css/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>
  @if(session('crear')=='ok')
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Creado con éxito',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@stop