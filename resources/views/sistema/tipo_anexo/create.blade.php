@extends('adminlte::page')

@section('content_header')
    <h3>Crear Tipo de Anexo </h3>
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
      {{-- <div class="row">
        <div class="col-12">
          <div class="list-group-item list-group-item-action list-group-item-success" >
            This is a success list group item</a>
        </div>
        </div>

    </div> --}}
<br>
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Nuevo Tipo de Anexo</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url('tipo-anexo')}}" method="POST" >
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>

                </div>
<div class="row">
    <a class="btnt btn-dark btn-sm" href="{{ url('/tipo-anexo')  }}" tabindex="5"> Cancelar</a>
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