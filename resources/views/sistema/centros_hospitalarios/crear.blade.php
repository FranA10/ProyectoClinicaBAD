@extends('adminlte::page')

@section('title','CentroHospitalario crear')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-1">
            <!--Mensaje flash-->
            @if(session('claveCentroHsave'))
                <div class="alert alert-success">
                    {{ session('claveCentroHsave') }}
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
                <form action="{{ route('save')}}" method="POST">
                @csrf
                    <div class="card-header text-center">AGREGAR CENTRO</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">ID</label>
                            <input type="text" name="pk_centro" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nom_centro" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Direccion</label>
                            <input type="text" name="direccion" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Tel.</label>
                            <input type="tel" name="telefono" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">N° Registro</label>
                            <input type="text" name="num_registro" class="form-control col-md-9">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Estado</label>
                            <input type="number" name="estado" class="form-control col-md-9">
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
<a class="btn btn-light btn-sm mt-2" href="{{ route('listCentro') }}">&laquo Volver</a>
@stop