@extends('layouts.admin')
@section('title', 'Votos Ejercidos')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-primary card-outline card-header">
          <h4>Alta de votos</h4>
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
              
              <div class="col-md-12"><br> 
                <div class="table-responsive">
                  <table id="tableExport" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Gerencia </th>
                        <th>Funcionarios que ejercieron el voto </th>
                        
                        
                      </tr>                             
                    </thead>
                    <tbody>
                      @foreach($votantes as $c)
                        <tr>
                          <td>
                              {{ $c->gerencia->descricion }}
                          </td>
                          @if ($c->confirmed == 0)
                            <td>
                             {{ $c->where('confirmed',0)->count() }}
                          </td>
                          @else
                          <td>{{ $c->where('confirmed',1)
                          ->where('gerencia_id',$c->gerencia_id)
                          ->count() }}</td>
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
  <script type="text/javascript">

   var form    = false;


$(document).ready(function() {

  form = $('#main-form');
     
    $.fn.eventos();

    
  

  //$('#objetivos').hide();
    
});


$.fn.eventos = function(){


  
  $('#gerencias').on("change", function(e) { //asigno el evento change u otro
   
    gerencias = e.target.value;
    console.log(gerencias);
    if(gerencias != '0')
    {

      $.fn.get_municipio(gerencias);
      $("persona_id").removeAttr('disabled');

     
    }else{
      console.log('epa selecciona un proyecto valido');
    }

  });
  
}

/********* AJAX ***********/

$.fn.get_municipio = function(gerencias){

      $.ajax({url: "/votantes/"+gerencias+"/personal",
        method: 'GET',
        //data: {'gerencias': estados_id}
      }).then(function(result) {
        console.log(result);
          
        $('#persona_id').html('<option value="0"> Seleccione el funcionario </option>');
        

        $(result).each(function( index, element ) {
          console.log(element.tx_nombres);
          $('#persona_id').append('<option value="'+ element.id +'">'+ element.tx_nombres +' '+ element.tx_apellidos + '</option>');
      
        });
      })
      .catch(function(err) {
          console.error(err);
      });

}

 

  </script>
<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
@endpush