@extends('layouts.admin')

@section('title', 'Personal')
@section('page_title', 'Registro del 1x10')
@section('content')
 <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('VerRole')
          <a href="{{ url('solicitudes') }}" class="btn  green darken-4 text-white "><i class="mdi mdi-sort-alphabetical-ascending"></i> Listado</a>
          @endcan
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
          <div class="card-header  ">
           
              <h3>Datos para registrar el 1x10</h3>
            </div> 
          <div class="card-body">
            
                 <form method="post"  action="{{url('personal/1p10/guardar')}} "  autocomplete="off">
                  {{ csrf_field() }}

              <div class="row">
               
                @include('admin.personal.partials.formp')
              
                 </div>
               </div>
                <div class="col-12 mt-4">
                    <table id="tableExport" class="display table table-hover ">
                  <thead>
                    <tr>
                    <th>#</th>
                    <th>Empleado</th>
                    <th>Cédula</th>
                    <th>Ente</th>
                    <th>Gerencia</th>
                    <th>Estado del empleado</th>
                    
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($personales as $personal)
                 
                    <tr class="row{{ $personal->id }}">
                   
                    <td>{{ $personal->id}}</td>
                    <td>{{ $personal->funcionario->display_name }} - ({{ $personal->funcionario->ente->descripcion }})</td>
                    <td>{{ $personal->display_name }}</td>
                    <td>{{ $personal->cedula }}</td>
                    <td>{{ $personal->telefono }}</td>
                    
                    <td>{{ $personal->estado->name }} - {{ $personal->municipio->name }} - {{ $personal->parroquia->parroquia }}</td>
                    <td>
                       <a href="{{ url('personal/1x10/'.$personal->id) }}" target="_blank" class="btn btn-round green darken-3"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar datos."></i></a> 


                    </td>
                    </tr>
                   @include('layouts.partials.modal.personal.updatepersonal')
                    @endforeach
                   
                    </tbody>                
                </table>
 
              </div>
              </div>
             
            </form>
       </div>
   </div>
</div>
</div>
@endsection

@push('scripts')

    <script src="{{ asset('js/admin/solicitud/create.js') }}"></script>
    <script src="{{ asset('js/admin/solicitud/form.js') }}"></script>
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
      centro_electoral: {
        required: true,
       
      },
      cedula: {
        required: true,
        number:true
      },
      telefono: {
        required: true,
        number:true
      },
       estado_id: {
        required: true
      },
      
      municipio_id: {
        required: true
      },
       parroquia_id: {
        required: true
      },
    },
    messages: { 
      tx_nombres: {
        required: "Por favor ingresar los nombres ",
      },
      tx_apellidos: {
        required: "Por favor ingresar los apellidos "
      },
       cedula: {
        required: "Por favor ingresar la cédula ",
         number: "Por favor ingresar números válidos"
      },
       telefono: {
        required: "Por favor ingresar la cédula ",
         number: "Por favor ingresar números válidos"
      },
       estado_id: {
        required: "Debes seleccionar la gerencia que pertenece el empleado."

      },
       municipio_id: {
        required: "Debes seleccionar el ente que pertenece el empleado."

      },
      parroquia_id: {
        required: "Debes seleccionar el ente que pertenece el empleado."

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

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });

        var cleavePN = new Cleave('.phone-number', {
         phone: true,
         phoneRegionCode: 've'
        });

      });

   



@endpush