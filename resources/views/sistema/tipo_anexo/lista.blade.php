@extends('adminlte::page')

@section('content_header')
    <h3>Tipos de Anexos </h3>
@endsection

@section('content')
    
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                 <a class="btn btn-primary btn-sm" href="{{ url('/tipo-anexo/create')  }}"><i class="fas fa-plus"></i> Crear</a>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">

                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <tr>
                      <th>Nombre</th>
                      <th>#</th>

                    </tr>
                    @foreach($objetos as $objeto)
                    <tr>
                      <td>{{$objeto->tipo_anexo}}</td>
                      <td>
                        <form action="{{ route('tipo-anexo.destroy', $objeto->id_tipo_anexo) }}" method="POST" class="eliminarRegistro">
                         @method('DELETE')
                         @csrf 
                        <a class="btn btn-warning btn-sm" href="{{url('tipo-anexo/'.$objeto->id_tipo_anexo.'/edit')}}"><i class="fas fa-pencil-alt"></i></a> 
                          <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                  {{ $objetos->links() }}
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
  text: "Este Tipo de Anexo será eliminado permanentemente",
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