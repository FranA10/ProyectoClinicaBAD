@extends('adminlte::page')

@section('content_header')
    <h3>Tipos de Examen </h3>
@endsection

@section('content')
    
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                 <a class="btn btn-primary" href="tipo-examen/create">Crear</a>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
  
                      {{-- <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                    </tr>
                    @foreach($tiposexam as $tipoex)
                    <tr>
                      <td>
                          <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button> 
                          <button class="btn btn-danger btn-sm"><i class="fas fa-pencil-alt"></i></button> 

                        </td>
                      <td>{{$tipoex->nombre_tipo_exam}}</td>
                      <td>{{$tipoex->descripcion_tipo_exam}} </td>
                      <td><span class="tag tag-success">{{$tipoex->precio}} </span></td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div><!-- /.row -->

@endsection