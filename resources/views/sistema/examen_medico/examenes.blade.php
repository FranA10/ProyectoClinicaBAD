@extends('adminlte::page')

@section('content_header')
    <h3>Examenes Médicos</h3>
@endsection

@section('content')
    
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                 <a class="btn btn-primary btn-sm" href="{{ route('crear_examen')  }}"><i class="fas fa-plus"></i> Crear</a>
  
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
                      <th>Descripción</th>
                      <th>Precio</th>

                      <th>Fecha Resultados</th>
                      <th>#</th>

                    </tr>
                    @foreach($objetos as $objeto)
                    <tr>
                      <td>
                          {{-- <form action="{{ route('tipo-examen.destroy', $tipoex->pk_tipo_examen) }}" method="POST" class="eliminarRegistro">
                           @method('DELETE')
                           @csrf  --}}
                          <a class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i>Ver</a> 
                            {{-- <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form> --}}
                        </td>
                      <td>{{$objeto->nombre_examen}}</td>
                      <td>{{$objeto->observacion}} </td>
                      <td><span class="tag tag-success">$ {{number_format($objeto->precio,2)}} </span></td>
                      <td>{{$objeto->fecha_resultado}} </td>
                      <td>
                        {{-- <form action="{{ route('tipo-examen.destroy', $tipoex->pk_tipo_examen) }}" method="POST" class="eliminarRegistro">
                         @method('DELETE')
                         @csrf  --}}
                        <a class="btn btn-warning btn-sm" ><i class="fas fa-eye"></i>Ver</a> 
                          {{-- <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash-alt"></i>
                          </button>
                      </form> --}}
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