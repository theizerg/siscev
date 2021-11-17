@extends('layouts.admin')

@section('title', 'Personal')
@section('page_title', 'Editar datos del votante 1x10')
@section('content')
  <div class="col-md-12">
    <div class="card card-line-primary">
      
     
       <!-- /.card-header -->
          <div class="card-body table-responsive">
               {!! Form::model($personales, ['url' => ['personal/1p10/guardareditado',$personales->id],'method' => 'PUT']) !!}

             <div class="row">
               
                @include('admin.personal.partials.formp')
              
              </div>

             {!! Form::close()!!}
          
          </div>
          <!-- /.card-body -->
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