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
            
                 <form method="post" main-form action="{{url('personal/1p10/guardar')}} "  autocomplete="off">
                  {{ csrf_field() }}

              <div class="row">
               <div class="col-sm-4">
                 

                 
                  <label>Funcionario </label>
                   <input type="text" disabled value="{{ $funcionario->display_name }}" class="form-control"> 
                    <input type="hidden" name="personal_id" value="{{ $funcionario->id }}">
                  
                </div>

                <div class="col-sm-4">
                   <div class="form-group">
                  <label>Nombre </label>
                    {{ Form:: text('tx_nombres',null,['class'=>'form-control','placeholder' => 'Nombre ','required']) }}
                    
                  </div>
                </div>
              <div class="col-sm-4">
               
                  <label>Apellido </label>
                    {{ Form:: text('tx_apellidos',null,['class'=>'form-control','placeholder' => 'Apellido ','required']) }}
                    
                  </div>
                   <div class="col-sm-4">
                  <label>Cédula </label>
                    {{ Form:: text('cedula',null,['class'=>'form-control','placeholder' => 'Cédula ','required']) }}
                  </div>
                   <div class="col-sm-4">
                  <label>Teléfono </label>
                    {{ Form:: text('telefono',null,['class'=>'form-control','placeholder' => 'Teléfono ','required']) }}
                  </div>
                   <div class="col-sm-4">
                  <label>Centro electoral</label>
                    {{ Form:: text('centro_electoral',null,['class'=>'form-control','placeholder' => 'Centro electoral ','required']) }}
                  </div>
                   @php
                  $estados = App\Models\Estado::get()
                @endphp
                  <div class="col-sm-4">
                  <label class="font-weight-bolder" for="empresa">Estados del país</label>
                 <select name="estado_id" id="estados_id" class="form-control select2">
                  <option value="0">Seleccione</option>
                   @foreach ($estados as $value)
                     <option value="{{ $value->id }} "> {{ $value->name }}</option>
                   @endforeach
                 </select>
                </div>
                 <div class="col-sm-4">
                  <label class="font-weight-bolder" for="empresa">Municipios del país</label>
                 <select name="municipio_id" id="municipio_id" class="form-control">
                  <option value="0" disable="true" selected="true"></option>
                  
                 </select>
                </div>
                  <div class="col-sm-4">
                  <label class="font-weight-bolder" for="empresa">Parroquias del país</label>
                 <select name="parroquia_id" id="parroquia_id" class="form-control">
                  <option value="0" disable="true" selected="true"></option>
                  
                 </select>
                </div>

                <br><br><br><br>
               <button type="submit" class="btn green darken-4 text-white  form-control" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
               
              
                 </div>
               </div>
                <div class="col-12">
                  <table id="tableExport" class="display table table-hover ">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Funcinario</th>
                    <th>Nombre completo</th>
                    <th>Cedula</th>
                    <th>Teléfono</th>
                    <th>Estado - Municipio - Parroquia</th>
                   </tr>
                 </thead>
                 <tbody>
                 @foreach ($personales as $element)
                  <tr class="row{{ $element->id }}">
                    <td>{{ $element->id}}</td>
                    <td>{{ $element->funcionario->display_name }} - ({{ $element->funcionario->ente->descripcion }})</td>
                    <td>{{ $element->display_name }}</td>
                    <td>{{ $element->cedula }}</td>
                    <td>{{ $element->telefono }}</td>
                    
                    <td>{{ $element->estado->name }} - {{ $element->municipio->name }} - {{ $element->parroquia->parroquia }}</td>
                  </tr>
                </tbody>
                 @endforeach
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