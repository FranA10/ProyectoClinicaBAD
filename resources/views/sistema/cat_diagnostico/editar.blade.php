@extends('adminlte::page')

@section('title','Editar Diagnostico')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveEditarCD'))
                <div class="alert alert-success">
                    {{ session('claveEditarCD') }}
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
                <form action="{{ route('editCD', $diagnostico->pk_cod_inter) }}" method="POST">
                @csrf @method('PATCH')
                    <div class="card-header text-center">MODIFICAR DIAGNOSTICO</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Cod. Inter.</label>
                            <input type="text" name="pk_cod_inter" class="form-control col-md-9" 
                            value="{{ $diagnostico->pk_cod_inter }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre_diagnostico" class="form-control col-md-9" 
                            value="{{ $diagnostico->nombre_diagnostico }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-4">Descripcion</label>
                            <textarea class="form-control" rows="5" name="descripcion">{{ $diagnostico->descripcion }}</textarea>
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-light btn-sm mt-2" href="{{ route('listCD') }}">&laquo Volver</a>
@stop