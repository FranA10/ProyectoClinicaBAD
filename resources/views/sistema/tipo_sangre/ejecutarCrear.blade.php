@extends('adminlte::page')

@section('title','Procesos almacenados Tipo Sangre')


@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('EJECUTADO'))
                <div class="alert alert-success">
                    {{ session('EJECUTADO') }}
                </div>
            @endif

            <div class="card">
                <form action="{{ route('crearTS')}}" method="POST">
                @csrf
                    <div class="card-header text-center">AGREGAR TIPOS DE SANGRE</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">EJECUTAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-light btn-sm mt-2" href="{{ route('listarTS') }}">&laquo Volver</a>
@stop
