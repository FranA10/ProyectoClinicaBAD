@extends('adminlte::page')

@section('title','Configuracion Inicial')

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
            <div class="container">
                <div class="row">
                    <div>
                        <img src="vendor/adminlte/dist/img/advertencia.png" alt="..." class="img-thumbnail" width="60" height="40">
                    </div>
                    <div class="col-sm-10">
                        <div class="alert alert-warning" role="alert">
                            <a class="alert-link">Precaución!! Estos procesos son de configuración inicial, se recomienda leer el manual de instalación antes de ejecutar alguno de ellos.</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <form action="{{ route('crearES')}}" method="POST">
                @csrf
                    <div class="card-header text-center">Generar Estados Civiles</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">EJECUTAR</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <form action="{{ route('crearGN')}}" method="POST">
                @csrf
                    <div class="card-header text-center">Generar Sexos</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">EJECUTAR</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <form action="{{ route('crearPSCI')}}" method="POST">
                @csrf
                    <div class="card-header text-center">Generar Paises y Ciudades</div>
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
<a class="btn btn-light btn-sm mt-2" href="{{ route('home') }}">&laquo Volver</a>
@stop