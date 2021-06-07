@extends('adminlte::page')

@section('content_header')
    <h3>Examen Médico</h3>
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
              <form role="form" method="POST" >
                @csrf
                <!-- text input -->


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