@extends('adminlte::page')

@section('title','Crear Diagnostico')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveSaveCD'))
                <div class="alert alert-success">
                    {{ session('claveSaveCD') }}
                </div>
            @endif

            <!--Validación de errores-->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <form action="{{ route('saveCD')}}" method="POST">
                @csrf
                    <div class="card-header text-center">AGREGAR NUEVO DIGNOSTICO</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Cod. Inter.</label>
                            <input type="text" name="pk_cod_inter" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre_diagnostico" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-4">Descripcion</label>
                            <textarea class="form-control" rows="5" name="descripcion"></textarea>
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-light btn-sm mt-2" href="{{ route('listCD') }}">&laquo Volver</a>
@stop