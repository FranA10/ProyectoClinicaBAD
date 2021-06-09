@extends('adminlte::page')

@section('content_header')
    {{-- <h3>Signos vitales </h3> --}}
@endsection


@section('content')
    
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                 {{-- <a class="btn btn-primary" href="{{ url('/signo-vital/create')  }}">Crear</a> --}}
                  <h3>Signos vitales </h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <tr>
                      <th></th>
                      <th>Nombre</th>
                      <th>Valor</th>
                      <th>Consulta</th>
                     
                    </tr>
                    @foreach($signosvital as $signo)
                    <tr>
                      <td>
                          <form action="" method="POST" class="eliminarRegistro">
                           @method('DELETE')
                           @csrf 
                          <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button> 
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        </td>
                      <td>{{$signo->nombre_signo}}</td>
                      <td>{{$signo->valor_signo}}</td>
                    
                    </tr>
                    @endforeach
                  </table>
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
    Swal.fire(
      '¡Eliminado!',
      'Registro eliminado con éxito',
      'success'
    )
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

