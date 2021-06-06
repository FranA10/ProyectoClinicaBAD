@extends('adminlte::page')

@section('title','CentroHospitalario Editar')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveEditarCentro'))
                <div class="alert alert-success">
                    {{ session('claveEditarCentro') }}
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
                <form action="{{ route('editCentro', $centro->pk_centro) }}" method="POST">
                @csrf @method('PATCH')
                    <div class="card-header text-center">MODIFICAR CENTRO</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">ID</label>
                            <input type="text" name="pk_centro" class="form-control col-md-9" 
                            value="{{ $centro->pk_centro }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nom_centro" class="form-control col-md-9" 
                            value="{{ $centro->nom_centro }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Direccion</label>
                            <input type="text" name="direccion" class="form-control col-md-9" 
                            value="{{ $centro->direccion }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Tel.</label>
                            <input type="tel" name="telefono" class="form-control col-md-9" 
                            value="{{ $centro->telefono }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">N° Registro</label>
                            <input type="text" name="num_registro" class="form-control col-md-9" 
                            value="{{ $centro->num_registro }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Estado</label>
                            <input type="number" name="estado" class="form-control col-md-9" 
                            value="{{ $centro->estado }}">
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
<a class="btn btn-light btn-sm mt-2" href="{{ route('listCentro') }}">&laquo Volver</a>
@stop