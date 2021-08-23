<div class="modal fade" id="personalModal" role="dialog" aria-labelledby="formModal"
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
      {!! Form::open(['route' => ['personal.store'],'method' => 'POST','id'=>'personal_form']) !!}

            @include('admin.personal.partials.form')

             {!! Form::close()!!}
      </div>
    
    {!! Form::close()!!}
      </div>
    </div>
  </div>
       
  