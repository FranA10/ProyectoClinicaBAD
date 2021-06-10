@extends('adminlte::page')

@section('title','Lista de Centros')
@section('content_header')
    <h2 class="text-center mb-5">Tipos de Sangre</h2>
@endsection

@section('content')
<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <a class="btn btn-success mb-4" href="{{ route('formTS')  }}">Generar Tipos</a>
            <table class="table table-bordered table-stripied text-center">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipo as $datos)
                    <tr>
                        <td>{{ $datos->pk_codsangre }}</td>
                        <td>{{ $datos->estado }}</td>
                        <td>
                            <form action="{{ route('deleteTS', $datos->pk_codsangre) }}" method="POST" class="eliminarRegistro">
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
            {{ $tipo->links() }}
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
@if (session('claveEliminar')=='OK')
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
      text: "Este Tipo de Sangre será eliminado permanentemente",
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