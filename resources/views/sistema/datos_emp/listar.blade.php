@extends('adminlte::page')

@section('title','Lista empleados')
@section('content_header')
    <h2 class="text-center mb-5">Centros Hospitalarios</h2>
@endsection

@section('content')
<div class="conteiner mt-2">
    <div class="card justify-content-center">
        <div class="card-header">
            <a class="btn btn-success mb-4" href="{{ route('ListDE)  }}">Agregar Empleado</a>
            <table class="table table-bordered table-stripied text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Documento de identidad</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persona as $datos)
                    <tr>
                        <td>{{ $datos->pk_num_personal }}</td>
                        <td>{{ $datos->nombre_1}}</td>
                        <td>{{ $datos->dui }}</td>
                        <td>{{ $datos->tel_contacto }}</td>
                        <td>{{ $datos->correo }}</td>
                        <td>{{ $datos->estado }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@stop 