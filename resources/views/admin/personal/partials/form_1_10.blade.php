<div class="row">
      <div class="col-sm-12">
      
   
         <div class="form-group">
          <label>Nombre del empleado</label>
            {{ Form:: text('tx_nombres',null,['class'=>'form-control','placeholder' => 'Nombre del empleado','required']) }}
            
          </div>
       
        <div class="form-group">
          <label>Apellido del empleado</label>
            {{ Form:: text('tx_apellidos',null,['class'=>'form-control','placeholder' => 'Apellido del empleado','required']) }}
            
          </div>
          <div class="form-group">
          <label>Cédula del empleado</label>
            {{ Form:: text('cedula',null,['class'=>'form-control','placeholder' => 'Cédula del empleado','required']) }}
          </div>
           <div class="form-group">
           
          <label>Ente del empleado</label>
           
        @php
          $entes = App\Models\Estado::pluck('name', 'id')
        @endphp
           {!! Form::select('estado_id', $entes, null,array('class' => 'form-control input-sm  entes_form','placeholder'=>'Selecione el ente ','data-width'=>'100%')) !!}    
     
          </div>
           <div class="form-group">
           
          <label>Gerencia del empleado</label>
           
       
           <select name="gerencia_id" data-width="100%" class="form-control input-sm select2 gerencia_form">
              
           </select>  
     
          </div>

          <div class="form-group">
                <label for="status_id">Estado del empleado</label>
                <div class="checkbox">
                  <label>
                    <input type="radio" name="status_id" value="1" checked> Activo&nbsp;&nbsp;
                    <input type="radio" name="status_id" value="2"> Jubilado
                  </label>
                </div>
              </div>

      <div class="col-sm-12">
          <button type="submit" class="btn blue darken-4 form-control text-white">
              Guardar empleado
          </button>
      </div>
  </div>
@push('scripts')


    <script type="text/javascript">

  var form    = false;


$(document).ready(function() {

  form = $('#personal_forms');
     
    $.fn.eventos();
    
  

  //$('#objetivos').hide();
    
});


$.fn.eventos = function(){


  $('.entes_form').unbind('change');//borro evento click
  $('.entes_form').on("change", function(e) { //asigno el evento change u otro
   
    entes_form = e.target.value;
    console.log(entes_form);
    if(entes_form != '0')
    {
      $.fn.get_municipio(entes_form);
      
    }else{
      console.log('epa selecciona un proyecto valido');
    }

  });

  $('#municipio_id').unbind('change');//borro evento click
  $('#municipio_id').on("change", function(e) { //asigno el evento change u otro
    
     municipio_id= e.target.value;

   


     $.fn.get_parroquias(municipio_id);

  });

  
}

/********* AJAX ***********/

/********* AJAX ***********/

$.fn.get_municipio = function(estados_id){

      $.ajax({url: "/estado/"+estados_id+"/municipios",
        method: 'GET',
        //data: {'estados_id': estados_id}
      }).then(function(result) {
        console.log(result);
          
        $('#municipio_id').html('<option value="0"> Seleccione </option>');
        

        $(result).each(function( index, element ) {

          $('#municipio_id').append('<option value="'+ element.id +'">'+ element.municipio +'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

}

    $.fn.get_parroquias = function(municipio_id){

 
      $.ajax({url: "/municipio/"+ municipio_id +"/parroquias",
      method: 'GET',

    }).then(function(result) {

          console.log(result);


        $('#parroquia_id').html('<option value="0"> Seleccione </option>');

        $( result).each(function( index, element ) {

          $('#parroquia_id').append('<option value="'+ element.id +'">'+ element.parroquia +'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });
      
         
   }

 

  </script>
  {{-- expr --}}
@endpush