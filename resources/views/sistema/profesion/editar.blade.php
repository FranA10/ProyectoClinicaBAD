@extends('adminlte::page')

@section('title','Profesion Editar')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveEditarProfesion'))
                <div class="alert alert-success">
                    {{ session('claveEditarProfesion') }}
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
                <form action="{{ route('editPF', $profesion->pk_profesion) }}" method="POST">
                @csrf @method('PATCH')
                    <div class="card-header text-center">MODIFICAR CENTRO</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">ID</label>
                            <input type="text" name="pk_profesion" class="form-control col-md-9" 
                            value="{{ $profesion->pk_profesion }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9" 
                            value="{{ $profesion->nombre }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Estado</label>
                            <input type="number" name="estado" class="form-control col-md-9" 
                            value="{{ $profesion->estado }}">
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
<a class="btn btn-light btn-sm mt-2" href="{{ route('listPF') }}">&laquo Volver</a>
@stop