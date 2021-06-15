@extends('adminlte::page')

@section('content_header')
    <h3>Registrar nuevo empleado </h3>
@endsection

@section('content')

<div class="row">
    <div class="col-md-11">
        <div class="card card-info">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('saveDE')}}" method="POST">
                @csrf
                <!-- text input -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Primer nombre</label>
                            <input type="text"  id="nombre1" name="nombre1" class="form-control" placeholder="Enter ...">
                            @error('nombre1')
                              <br>
                              <small> {{$message}}</small>
                              <br>
                            @enderror
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Segundo nombre</label>
                            <input type="text" id="nombre2" name="nombre2" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Primer apellido</label>
                            <input type="text"  id="apellido1" name="apellido1" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Segundo apellido</label>
                            <input type="text" id="apellido2" name="apellido2" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Apellido casada</label>
                            <input type="text"  id="apellidoc" name="apellidoc" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" id="idcorreo" name="idcorreo" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control" id="idGenero" name="idGenero">
                           <option value="0">Elegir...</option>
                            @foreach($catGenero as $objeto)
                              <option value="{{$objeto->pk_genero}}">{{$objeto->nombre_genero}}</option>
                              @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Fecha de nacimiento</label>
                            <input type="text" id="idfnacimiento" name="idfnacimiento" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>País</label>                            
                            <select class="form-control" id="idPais" name="idPais">
                           <option value="0">Ingrese un pais</option>
                            @foreach($catPais as $objeto)
                              <option value="{{$objeto->pk_pais}}">{{$objeto->nombre}}</option>
                              @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" id="iddireccion" name="iddireccion" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Teléfono de contacto</label>
                            <input type="text"  id="idTel" name="idTel" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Estado civil</label>
                            <select class="form-control" id="idEstadoC" name="idEstadoC">
                           <option value="0">Elegir...</option>
                            @foreach($catEstadoc as $objeto)
                              <option value="{{$objeto->pk_estado_civil}}">{{$objeto->nombre}}</option>
                              @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Profesión</label>
                            <select class="form-control" id="idprofesion" name="idprofesion">
                           <option value="0">Seleccione una profesion</option>
                            @foreach($catProfesion as $objeto)
                              <option value="{{$objeto->pk_profesion}}">{{$objeto->nombre}}</option>
                              @endforeach
                            </select>
                            </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tipo de sangre</label>
                            <select class="form-control" id="idtsangre" name="idtsangre">
                           <option value="0">Seleccione un tipo</option>
                            @foreach($catTSangre as $objeto)
                              <option value="{{$objeto->pk_codsangre}}">{{$objeto->pk_codsangre}}</option>
                              @endforeach
                            </select>
                           </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Licencia de conducir</label>
                            <input type="text"  id="idLicencia" name="idLicencia" class="form-control" placeholder="Enter ...">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Licencia médica</label>
                            <input type="text" id="idLicMed" name="idLicMed" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Documento de identidad</label>
                            <input type="text"  id="iddoc" name="iddoc" class="form-control" placeholder="Ingrese su Documento de identidad">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Pasaporte</label>
                            <input type="text" id="idpasaporte" name="idpasaporte" class="form-control" placeholder="Enter ..." >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Número de documento tributario</label>
                            <input type="text"  id="idnit" name="idnit" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Centro Hospitalario</label>
                            <select class="form-control" id="idcentroH" name="idcentroH">
                           <option value="0">Seleccione un centro</option>
                            @foreach($catCentro as $objeto)
                              <option value="{{$objeto->pk_centro}}">{{$objeto->nom_centro}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                </div>
<div class="row">
    <a class="btnt btn-dark btn-sm" href="{{ route('FormDE') }}" tabindex="5"> Cancelar</a>
    <button class="btn btn-primary btn-sm" tabindex="4">Crear</button>
</div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>  
    </div>
</div>

  @endsection

  
  @section('ccs')
<link rel="stylesheet" href="css/sweetalert2.min.css">
@stop

@section('js')
<script src="{{ asset('static/js/sweetalert2.all.min.js') }}"></script>
  @if(session('crear')=='ok')
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Creado con éxito',
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif

@stop