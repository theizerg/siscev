@extends('layouts.admin')

@section('title', 'Gerencias')
@section('page_title', 'Gerencias')
@section('content')
  <div class="col-md-12">
    <div class="card card-line-primary">
      <div class="card-header">
        <h3>Listado de gerencias actualmente registradas.</h3>
       
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
                <a href="/gerencias" class="link_ruta">
                  Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a  data-toggle="modal" data-target="#gerenciaModal" class="btn btn-sm green darken-3 text-white"><i class="mdi mdi-plus mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Registro de nueva gerencia."></i>Nueva gerencia</a>
              </li>
           
            </ul><br>
              <table id="tableExport" class="display table table-hover ">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Ente</th>
                    <th>Descripción</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($gerencias as $gerencia)
                    <tr class="row{{ $gerencia->id }}">
                    <td>{{ $gerencia->id }}</td>
                    <td>{{ $gerencia->entes->descripcion }}</td>
                    <td>{{ $gerencia->descricion }}</td>
                   
                    <td>
                     <a  data-toggle="modal" data-target="#gerenciaModal{{$gerencia->id}}" class="btn btn-round green darken-3"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Editar datos de la gerencia."></i></a> 

                       <a href="{{ url('/gerencia/borrar',$gerencia->id) }}"  class="btn btn-round green darken-3"><i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                      title="Borrar datos de la gerencia."></i></a>                      
                      
                    </td>
                    </tr>
                    @include('layouts.partials.modal.gerencias.updategerencia')
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
  $(document).ready(function () {
  $('#gerencia_form').validate({
    rules: {
      descricion: {
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
      
      ente_id: {
        required: true
      },
    },
    messages: { 
      descricion: {
        required: "Por favor ingresar el nombre de la gerencia",
      },
       ente_id: {
        required: "Debes seleccionar el ente de la gerencia."

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