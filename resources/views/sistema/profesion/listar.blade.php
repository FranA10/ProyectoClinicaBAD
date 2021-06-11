@extends('adminlte::page')

@section('title','Lista de Profesiones')
@section('content_header')
    <h2 class="text-center mb-5">Tipos de Profesiones</h2>
@endsection

@section('content')
<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <a class="btn btn-success mb-4" href="{{ route('formPF')  }}">Agregar Profesion</a>
            <table class="table table-bordered table-stripied text-center">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profesiones as $datos)
                    <tr>
                        <td>{{ $datos->pk_profesion }}</td>
                        <td>{{ $datos->nombre }}</td>
                        <td>{{ $datos->estado }}</td>
                        <td>
                            <a href="{{ route ('editFormPF', $datos->pk_profesion) }}" class="btn btn-primary md-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deletePF', $datos->pk_profesion) }}" method="POST" class="eliminarRegistro">
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
            {{ $profesiones->links() }}
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
@if (session('claveEliminarProfesion')=='OK')
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
      text: "Esta profesion será eliminado permanentemente",
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