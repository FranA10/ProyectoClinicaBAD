@extends('adminlte::page')

@section('content_header')
    <h3>Expedientes Médicos </h3>
@endsection

@section('content')
    
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                 <a class="btn btn-primary btn-sm" href="{{url('expediente-crear')}}" ><i class="fas fa-plus"></i> Crear</a>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
  
                      {{-- <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <tr>
                      <th>Nombre</th>
                      <th>Dui</th>
                      <th>Ultima Modificación</th>
                      <th>#</th>
                    </tr>
                    @foreach($objetos as $objeto)
                    <tr>

                      <td>{{$objeto->nombrePaciente}}</td>
                      <td>{{$objeto->dui}}</td>
                      <td>{{$objeto->fechaModificacion}}</td>
                      <td>
                        <form  method="POST" class="eliminarRegistro">
                         @method('DELETE')
                         @csrf 
                        <a class="btn btn-warning btn-sm" href="{{url('expediente/'.$objeto->oid)}}"><i class="fas fa-eye"></i> Ver</a> 
                          {{-- <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash-alt"></i>
                          </button> --}}
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                  {{-- {{ $objetos->links() }} --}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div><!-- /.row -->

          
@endsection

@section('ccs')
<link rel="stylesheet" href="css/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>

@if(session('eliminar')=='ok')
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Eliminado con éxito',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@if(session('actualizar')=='ok')
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Actualizado con éxito',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

<script type="text/javascript">

$('.eliminarRegistro').submit(function(e){
e.preventDefault();
Swal.fire({
  title: '¿Estás seguro?',
  text: "Este Tipo de Examen será eliminado permanentemente",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Sí, Eliminar!'
}).then((result) => {
  if (result.value) {

    this.submit();


  }
})
});


</script>
@stop   