@extends('adminlte::page')

@section('title','Home')
    
@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
     @livewire('admin.usuarios-index')
@stop
@section('ccs')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles()
@stop

@section('js')
    <script>console.log</script>
    @livewireScripts()
@stop    