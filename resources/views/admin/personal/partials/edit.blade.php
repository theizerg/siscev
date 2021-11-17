<div class="modal fade" id="personalModal{{$element->id}}" aria-labelledby="formModal"
          aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h3 class="modal-title" id="formModal">Editar datos del votante 1x10</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::model($element, ['url' => ['element.update',$element->id],'method' => 'PUT']) !!}

             <div class="row">
               
                @include('admin.personal.partials.formp')
              
              </div>

             {!! Form::close()!!}
      </div>
    
     
      </div>
    </div>
  </div>
       
  