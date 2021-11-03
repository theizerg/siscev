@extends('layouts.admin')

@section('title', 'Personal')
@section('page_title', 'Personal del banco')
@section('content')
  <div class="col-md-12">
    <div class="card card-line-primary">
      <div class="card-header">
        <h3>Listado del personal actualmente registrado.</h3>
       
      </div>
       <!-- /.card-header -->
          <div class="card-body table-responsive">
               <ul class="list-inline">
             <li class="list-inline-item">
                <a href="/" class="link_ruta">
                  Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
              </li>
             <li class="list-inline-item">
                <a href="/personal" class="link_ruta">
                  Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a  data-toggle="modal" data-target="#personalModal" class="btn btn-sm green darken-3 text-white"><i class="mdi mdi-plus mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Registro de nuevo empleado."></i>Nuevo empleado</a>
              </li>
           
            </ul><br>
          <table id="tableExport" class="display table table-hover ">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Empleado</th>
                    <th>Cédula</th>
                    <th>Ente</th>
                    <th>Gerencia</th>
                    <th>Estado del empleado</th>
                    <th>Fecha de registro</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($personales as $personal)
                    <tr class="row{{ $personal->id }}">
                    <td>{{ $personal->id }}</td>
                    <td>{{ $personal->display_name }}</td>
                    <td>{{ $personal->cedula }}</td>
                    <td>{{ $personal->ente->descripcion }}</td>
                    <td>{{ $personal->gerencia->descricion }}</td>
                   
                     <td><span class="badge text-white {{ $personal->status ? 'badge-success' : 'badge-danger' }}">{{ $personal->display_status }}</span></td>
                    <td> {{date_format(date_create($personal->fecha_emisison), 'd/m/Y' )}} </td>
                    <td>
                     <a  data-toggle="modal" data-target="#personalModal{{$personal->id}}" class="btn btn-round green darken-3"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar datos del empleado."></i></a> 

                       <a href="{{ url('/personal/borrar',$personal->id) }}"  class="btn btn-round green darken-3"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Borrar datos del empleado."></i></a>                      
                      
                    </td>
                    </tr>
                    @include('layouts.partials.modal.personal.updatepersonal')
                    @endforeach
                   
                    </tbody>                
                </table>
          </div>
          <!-- /.card-body -->
      </div>
  </div>
@endsection

@push('scripts')
 <script>
   $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 </script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    });
</script>

<script>
  $(document).ready(function () {
  $('#personal_form').validate({
    rules: {
      tx_nombres: {
        required: true,
        
      },
      tx_apellidos: {
        required: true,
       
      },
      cedula: {
        required: true,
        number:true
      },
       gerencia_id: {
        required: true
      },
    
    },
    messages: { 
      tx_nombres: {
        required: "Por favor ingresar los nombres del empleado",
      },
      tx_apellidos: {
        required: "Por favor ingresar los apellidos del empleado"
      },
       cedula: {
        required: "Por favor ingresar la cédula del empleado",
         number: "Por favor ingresar números válidos"
      },
       gerencia_id: {
        required: "Debes seleccionar las reparaciones."

      },
       
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@endpush