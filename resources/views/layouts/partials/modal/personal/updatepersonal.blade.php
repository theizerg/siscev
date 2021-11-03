<div class="modal fade" id="personalModal{{$personal->id}}" aria-labelledby="formModal"
          aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h2 class="modal-title" id="formModal">Registro de nuevo empleado</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::model($personal, ['route' => ['personal.update',$personal->id],'method' => 'PUT']) !!}

            @include('admin.personal.partials.form')

             {!! Form::close()!!}
      </div>
    
     
      </div>
    </div>
  </div>
       
  