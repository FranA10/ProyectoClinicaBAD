@extends('adminlte::page')

@section('content_header')
    {{-- <h3>Horarios</h3> --}}
@endsection


@section('content')

        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">

                    <div class="col-md-5">
                     {{-- <a class="btn btn-success"href="{{ url('/consulta_medica/create')  }}">Nueva consulta</a> --}}
                     <a class="btn btn-success" href="{{ url('/horarios/create')  }}">Agregar horarios</a>

                    </div>
                     <div class="col-md-7"><h3>Horarios</h3>
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
                      <th>Dia</th>
                      <th>Hora inicio</th>
                      <th>Hora fin</th>
                      <th>Estado</th>
                      <th></th>

                    </tr>
                    @foreach($horarios as $horario)
                    <tr>

                      <td>{{ $horario->dia_semana }}</td>
                      <td>{{date("H:i:s",strtotime($horario->hora_inicio))}}</td>

                      <td>{{date("H:i:s",strtotime($horario->hora_fin))}}</td>

                      {{-- <td>{{$horario->hora_fin}}</td> --}}
                      <td>{{$horario->estado_horario}}</td>

                      {{-- <td><span class="tag tag-success"> </span></td> --}}
                      <td>
                        {{-- <form action="{{ route('ver_historial_diagnostico.destroy', $historial->pk_diagnostico)}}" method="POST" class="eliminarRegistro"> --}}

                           {{-- @method('DELETE')
                           @csrf
                          <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button> --}}
                        {{-- </form> --}}
                        </td>
                    </tr>
                    @endforeach
                  </table>
                  {{ $horarios->links() }}

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
  text: "Este diagnostico sera eliminado permanentemente",
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

