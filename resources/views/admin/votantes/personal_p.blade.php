@extends('layouts.admin')
@section('title', 'Votantes 1x10')
@section('content')
 @php
  $gerencias =  App\Models\Gerencias::get()
  @endphp
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-primary card-outline card-header">
          <h4>Alta de votos 1x10 </h4>
        </div>

        <div class="card-body">
          <ul class="list-inline">
           <li class="list-inline-item">
              <a href="/" class="link_ruta">
                Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
              </a>
            </li>
           <li class="list-inline-item">
              <a href="/votaciones/listado" class="link_ruta">
                Listado de votantes &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
              </a>
            </li>
          </ul><br>
          <div class="row">
              <div class="col-md-3">
                <legend>Datos del votante</legend>
                {!! Form::open(['url' => ['votante/1x10/guardar'],'method' => 'POST','id'=>'votantes_form']) !!}
                  
                   <div class="form-group">
           
                    <label>Ente del empleado</label>
                     
                  @php
                    $entes = App\Models\Ente::get()
                  @endphp
                     <select  name="ente_id" id="funcionario_id" class="form-control  ente_form">
                      <option value="0">Seleccione el ente del funcionario</option>
                      @foreach ($entes as $element)
                        <option value="{{ $element->id }}">{{ $element->descripcion }}</option>
                      @endforeach
                    </select>   
               
                  </div>
                   <div class="form-group">
                     
                    <label>Gerencia del empleado</label>
                     
                 
                     <select name="gerencia_id"  class="form-control input-sm select2 gerencia_form">
                        
                     </select>  
               
                    </div>
                  <div class="form-group">
                    <label>Funcionario</label>
                    <select id="persona_id" class="form-control select2" name="funcionario_id" required >
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Personas del 1x10</label>
                    <select id="persona_p_id" class="form-control select2" name="personal_id" required >
                    </select>
                  </div>

                   <div class="form-group">
                <label class="font-weight-bolder text-center" for="status">¿Ejerció su derecho al voto?</label>
                <div class="checkbox icheck text-center">
                  <label class="font-weight-bolder">
                    <input type="radio" name="confirmed" value="1" checked> SÍ&nbsp;&nbsp;
                    <input type="radio" name="confirmed" value="0"> NO
                  </label>
                </div>
              </div>
                  <div class="form-group form-persona form-empresa" >
                    <button type="submit" class="btn btn-block green darken-3 text-white">Guardar</button>
                  </div>
                {!! Form::close()!!}
              </div>
              <div class="col-md-9"><br> 
                <div class="table-responsive">
                  <table id="tableExport" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nombre completo del funcionario</th>
                        <th>Votante 1x10</th>
                       
                        <th>¿Ejerció el voto?</th>
                        <th>Fecha de registro</th>
                      </tr>                             
                    </thead>
                    <tbody>
                      @foreach($votantes->sortByDesc('created_at') as $c)
                        <tr>
                          <td>
                              {{ $c->personal->tx_nombres }} {{ $c->personal->tx_apellidos }} ({{ $c->personal->ente->descripcion }})
                          </td>
                          <td>{{ $c->persona->display_name }}</td>
                          
                         <td><h2 class="badge text-white {{ $c->confirmed ? 'badge-success' : 'badge-danger' }}">{{ $c->display_status }}</h2></td>
                          @if($c->created_at != null)
                            <td>{{ date_format( $c->created_at, 'd/m/Y H:i:s' ) }}</td>
                          @else
                            <td></td>
                          @endif
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')

<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>


 <script type="text/javascript">

   var form    = false;


$(document).ready(function() {

  form = $('#personal_form');
     
    $.fn.eventos();

    
  

  //$('#objetivos').hide();
    
});


$.fn.eventos = function(){


  
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
          
        $('.gerencia_form').html('<option value="0"> Seleccione la gerencia del funcionario </option>');
        

        $(result).each(function( index, element ) {
          console.log(element.descricion);
          $('.gerencia_form').append('<option value="'+ element.id +'">'+ element.descricion +' </option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

}




  
  $('.gerencia_form').on("change", function(e) { //asigno el evento change u otro
   
    gerencia_form = e.target.value;
    console.log(gerencia_form);
    if(gerencia_form != '0')
    {

      $.fn.get_empleados(gerencia_form);
      $(".gerencia_form").removeAttr('disabled');

     
    }else{
      console.log('epa selecciona un proyecto valido');
    }

  });
  

  /********* AJAX ***********/

$.fn.get_empleados = function(gerencia_form){

      $.ajax({url: "/ente/"+gerencia_form+"/personal",
        method: 'GET',
        //data: {'gerencias': estados_id}
      }).then(function(result) {
        console.log(result);
          
         $('#persona_id').html('<option value="0"> Seleccione el funcionario </option>');
        

        $(result).each(function( index, element ) {
          console.log(element.tx_nombres);
          $('#persona_id').append('<option value="'+ element.id +'">'+ element.cedula +' | '+ element.tx_nombres +' '+'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });




}

$('#persona_id').on("change", function(e) { //asigno el evento change u otro
   
    persona_id = e.target.value;
    console.log(persona_id);
    if(persona_id != '0')
    {

      $.fn.get_personal_p(persona_id);
      $("#persona_id").removeAttr('disabled');

     
    }else{
      console.log('epa selecciona un proyecto valido');
    }

  });

/********* AJAX ***********/

$.fn.get_personal_p = function(persona_id){

      $.ajax({url: "/votante/"+persona_id+"/personal",
        method: 'GET',
        //data: {'gerencias': estados_id}
      }).then(function(result) {
        console.log(result);
          
         $('#persona_p_id').html('<option value="0"> Seleccione el funcionario </option>');
        

        $(result).each(function( index, element ) {
          console.log(element.tx_nombres);
          $('#persona_p_id').append('<option value="'+ element.id +'">'+ element.cedula +' | '+ element.tx_nombres +' '+ element.tx_apellidos +'</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });




}
  


 

  </script>
@endpush