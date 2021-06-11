@extends('adminlte::page')
@section('content_header')
{{-- 
<h3></h3>
--}}
@endsection
@section('content')

<a class="btn btn-sm btn-dark" href="{{url('expedientes')}}" ><i class="fas fa-arrow-left"></i>Regresar</a>

<div class="row">
   <div class="col-md-12">
      <div class="card card-success">
         <div class="card-header">
            <h3 class="card-title">Crear Expediente </h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <form role="form" method="POST" action="{{ url('crearexpediente')}}">
               @csrf
               <!-- text input -->
               <div class="row">
                  <div class="col-3">
                     <div class="form-group">
                        <label>Paciente</label>
                        <select class="form-control" id="sele" name="sele">
                           <option value="0">Elegir..</option>
                           @foreach($objetos as $objeto)
                              <option value="{{$objeto->pk_num_personal}}">{{$objeto->nombre_1." ".$objeto->nombre_2." ".$objeto->apellido_1}}</option>
                              @endforeach

                          </select>
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Fecha creación</label>
                        <input type="text" disabled  id="nombre" name="nombre" class="form-control" >
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Ultima Modificación</label>
                        <input type="text" disabled  id="nombre" name="nombre" class="form-control">
                     </div>
                  </div>
                  {{-- <div class="col-3">
                     <div class="form-group">
                        <label>Es Empleado</label>
                        <label class=" form-control">
                        <input type="checkbox" disabled id="esEmpleado" >
                        </label>
                     </div>
                  </div> --}}
                  <div class="col-3">
                     <div class="form-group">
                        <label>Telefono contacto</label>
                        <input type="text" disabled  id="telcontacto" name="telcontacto" class="form-control" >
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label>Nombre de Responsable</label>
                        <input type="text" disabled id="responsable" name="nombre" class="form-control" >
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label>Conctacto de Responsable</label>
                        <input type="text" disabled  id="telResponsable" name="nombre" class="form-control" >
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="descripcion"></textarea>
                     </div>
                  </div>
               </div>
               
               <hr/>
               <div class="row" >
                   <div class="col-6"><button class="btn btn-dark">Cancelar</button> </div>
                   <div class="col-6"><button type="submit" class="btn btn-primary">Crear</button> </div>

               </div>
               <hr/>


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


<script type="text/javascript">
$('#sele').on('change', function() {
      var value=this.value;
      if($('#sele').val()=="0"){
         $('#responsable').val('');
         $('#telResponsable').val('');
         $('#telcontacto').val('');

      }else{
         $.ajax({
    type: 'GET',
    url: "{{url('obtenerdpersonales')}}",
    data: {
        pk: value
    },
    success: function(data){
       
      $('#telcontacto').val(data.data.tel_contacto)
      $('#telResponsable').val(data.telResponsable)
      $('#responsable').val(data.responsable)

    },
    error: function(xhr){
        console.log(xhr.responseText);
    }
});
      }


   })
   </script>
@stop

