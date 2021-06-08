@extends('adminlte::page')

@section('title','Lista de Centros')
@section('content_header')
    <h2 class="text-center mb-5">Centros Hospitalarios</h2>
@endsection

@section('content')
<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <a class="btn btn-success mb-4" href="{{ route('formularioCentros')  }}">Agregar Centro</a>
            <table class="table table-bordered table-stripied text-center">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Dirreccion</th>
                        <th>Telefono</th>
                        <th>N° registro</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($centros as $datos)
                    <tr>
                        <td>{{ $datos->pk_centro }}</td>
                        <td>{{ $datos->nom_centro }}</td>
                        <td>{{ $datos->direccion }}</td>
                        <td>{{ $datos->telefono }}</td>
                        <td>{{ $datos->num_registro }}</td>
                        <td>{{ $datos->estado }}</td>
                        <td>
                            <a href="{{ route ('editFormCentro', $datos->pk_centro) }}" class="btn btn-primary md-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deleteCentro', $datos->pk_centro) }}" method="POST" class="eliminarRegistro">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $centros->links() }}
        </div>
    </div>
</div>
@endsection

@section('ccs')
<link rel="stylesheet" href="css/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>

<!-- Mensaje de confirmacion flash -->
@if (session('claveEliminarCentro')=='El Centro fue Eliminado!')
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