@extends('adminlte::page')

@section('content_header')
@endsection


@section('content')
    
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                <div class="row">
                  
                 <div class="col-md-5">
                  <a class="btn btn-success"href="{{ url('/consulta_medica/create')  }}">Nueva consulta</a>

                 </div>
                  <div class="col-md-7">  <h3>Consultas medicas</h3></div>
               

                </div>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <tr>
                      <th>Fecha</th>
                      <th>Consultada por</th>
                      
                      <th>Examen fisico</th>
                      
                      <th>Area de consulta</th>
                      <th></th>

                    </tr>
                    @foreach($consulta_medica as $consulta)
                    <tr>
                     
                      <td>{{$consulta->fecha}}</td>
                      <td>{{$consulta->consulta_por}}</td>
                      <td>{{$consulta->exam_fisico}}</td>
                      <td>{{$consulta->area_consulta}}<span class="tag tag-success"> </span></td>
                      <td>
                        <form action="{{ route('historial_diagnostico.destroy', $consulta->pk_consulta)}}" method="POST" class="eliminarRegistro">
                          
                           @method('DELETE')
                           @csrf 
                           <a class="btn btn-warning btn-sm" href="{{url('consulta_medica/'.$consulta->pk_consulta.'/edit')}}"><i class="fas fa-pencil-alt"></i></a> 
                          {{-- <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>  --}}
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                      </td>
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

