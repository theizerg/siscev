<div class="modal fade" id="gerenciaModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
              <div class="modal-header">
                <h2 class="modal-title" id="formModal">Nueva gerencia</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              {!! Form::open(['route' => ['gerencias.store'],'method' => 'POST','id'=>'gerencia_form']) !!}

                    @include('admin.gerencias.partials.form')


                     {!! Form::close()!!}
                    
              </div>
            
            
              </div>
            </div>
          </div>
        </div>
  