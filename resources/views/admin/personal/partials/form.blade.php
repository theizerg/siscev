<div class="row">
      <div class="col-sm-12">
      
     
   
         <div class="form-group">
          <label>Nombre del empleado</label>
            {{ Form:: text('tx_nombres',null,['class'=>'form-control','placeholder' => 'Nombre del empleado','id'=>'tx_nombres','required']) }}
            
          </div>
       
        <div class="form-group">
          <label>Apellido del empleado</label>
            {{ Form:: text('tx_apellidos',null,['class'=>'form-control','placeholder' => 'Apellido del empleado','id'=>'tx_apellidos','required']) }}
            
          </div>
          <div class="form-group">
          <label>Cédula del empleado</label>
            {{ Form:: text('cedula',null,['class'=>'form-control','placeholder' => 'Cédula del empleado','id'=>'cedula','required']) }}
          </div>
           <div class="form-group">
           
          <label>Ente del empleado</label>
           
        @php
          $entes = App\Models\Ente::pluck('descripcion', 'id')
        @endphp
           {!! Form::select('ente_id', $entes, null,array('class' => 'form-control input-sm  ente_form','placeholder'=>'Selecione el ente ','data-width'=>'100%')) !!}    
     
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

  form = $('#personal_form');
     
    $.fn.eventos();

    
  

  //$('#objetivos').hide();
    
});


$.fn.eventos = function(){


  $('.ente_form').unbind('change');//borro evento click
  $('.ente_form').on("change", function(e) { //asigno el evento change u otro
   
    ente_form = e.target.value;
    console.log(ente_form);
    if(ente_form != '0')
    {

      $.fn.get_municipio(ente_form);
      $(".gerencia_form").removeAttr('disabled');

     
    }else{
      console.log('epa selecciona un proyecto valido');
    }

  });
  
}

/********* AJAX ***********/

$.fn.get_municipio = function(ente_form){

      $.ajax({url: "/votantes/"+ente_form+"/gerencia",
        method: 'GET',
        //data: {'gerencias': estados_id}
      }).then(function(result) {
        console.log(result);
          
        $('.gerencia_form').html('<option value=""> Seleccione la gerencia del funcionario </option>');
        

        $(result).each(function( index, element ) {
          console.log(element.descricion);
          $('.gerencia_form').append('<option value="'+ element.id +'">'+ element.descricion +' </option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

}

 

  </script>
  @endpush