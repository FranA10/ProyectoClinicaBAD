@extends('adminlte::page')

@section('title','CentrosHospitalarios Lista')

@section('content')
<div class="conteiner mt-2">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Centros Hospitalarios</h2>
            <a class="btn btn-success mb-4" href="{{ route('formularioCentros')  }}">Agregar Centro</a>
            <!-- Mensaje de confirmacion flash -->
            @if (session('claveEliminarCentro'))
                <div class="alert alert-success">
                    {{ session('claveEliminarCentro') }}
                </div>
            @endif
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
                            <form action="{{ route('deleteCentro', $datos->pk_centro) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Esta seguro de borrar?');" class="btn btn-danger">
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
@stop