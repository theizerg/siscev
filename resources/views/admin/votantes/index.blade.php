@extends('layouts.admin')
@section('title', 'Votos')
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
              <a href="/votantes" class="link_ruta">
                Listado de votantes &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
              </a>
            </li>
          </ul><br>
          <div class="row">
              <div class="col-md-4">
                <legend>Datos del votante</legend>
                <form method="POST" action="{{ route('votantes.store') }}" id="main-form">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>Gerencia</label>
                    <select id="gerencias" class="form-control select2" name="gerencia_id" required>
                      @php
                      $gerencias =  App\Models\Gerencias::get()
                      @endphp
                       <option value="0">Seleccione una gerencia</option>
                      @foreach ($gerencias as $gerencia)
                      <option value="{{ $gerencia->id }}">{{ $gerencia->descricion }}</option>
                     @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Funcionario</label>
                    <select id="persona_id" class="form-control select2" name="personal_id" required >
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
                </form>
              </div>
              <div class="col-md-8"><br> 
                <div class="table-responsive">
                  <table id="tableExport" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nombre completo del funcionario</th>
                        <th>Gerencia del funcionario</th>
                        <th>¿El funcionario ejerció el voto?</th>
                        <th>Fecha de registro</th>
                      </tr>                             
                    </thead>
                    <tbody>
                      @foreach($votantes->sortByDesc('created_at') as $c)
                        <tr>
                          <td>
                              {{ $c->personal->tx_nombres }} {{ $c->personal->tx_apellidos }}
                          </td>
                          <td>
                             {{ $c->gerencia->descricion }}
                          </td>
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