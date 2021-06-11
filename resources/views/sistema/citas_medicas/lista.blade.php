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
                  
                 <div class="col-md-3">
                  <a class="btn btn-success"href="{{ url('/citas_medicas/create')  }}">Generar nueva cita medica</a>

                 </div>
                 <div class="col-md-5">
                  <a class="btn btn-info" >Generar consultas medicas</a>

                 </div>
                  <div>
                    <div class="center-block">
                      <h3 class="bold"><b>Citas medicas</b> </h3>
                    </div>
                  </div>
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
                      <th>Hora</th>
                      
                      <th>Observaciones</th>
                      
                      
                      <th></th>

                    </tr>
                    @foreach($citas_medica as $cita)
                    <tr>
                     
                      <td class="col-md-2">{{$cita->fecha_cita_medica}}</td>
                      <td class="col-md-1">{{$cita->hora_cita_medica}}</td>
                      <td class="col-md-7">{{$cita->observaciones_cita}}</td>
                      
                      <td class="col-md-2">
                        <form action="{{ route('citas_medicas.destroy', $cita->pk_cita_medica)}}" method="POST" class="eliminarRegistro">
                          
                           @method('DELETE')
                           @csrf 
                           <a class="btn btn-warning btn-sm" href="{{url('citas_medicas/'.$cita->pk_cita_medica.'/edit')}}"><i class="fas fa-pencil-alt"></i></a> 

                           {{-- <a class="btn btn-warning btn-sm" ><i class="fas fa-pencil-alt"></i></a>  --}}
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
  text: "Esta cita medica será eliminada permanentemente",
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

