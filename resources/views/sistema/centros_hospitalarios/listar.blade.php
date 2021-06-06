@extends('adminlte::page')

@section('title','CentrosHospitalarios Lista')

@section('content')
<div class="card">
    <ul>
    @foreach ($centros as $centros)
        <li>{{$centros->nom_centro}}</li>
    @endforeach
    </ul>
</div>
@stop