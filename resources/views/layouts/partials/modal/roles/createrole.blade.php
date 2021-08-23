<div class="modal fade" id="createModalRole" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Registrar nuevo tipo de reparación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 {!! Form::open(['route' => ['roles.store'],'method' => 'POST']) !!}
                <input type="hidden" id="guard_name" value="web">
           
              <div class="row">
                 <div class="col-sm-12">
                   <div class="form-group pading">
                   <label class="font-weight-bolder" for="name">Nombre</label>
                  <input class="form-control" required style="font-size: 15px;" id="name" name="name" placeholder="Nombres">
                  <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
                </div> 
                 
             
              </div>
              
             
            </div>
              <div class="card-footer">
                <button type="submit" class="btn blue darken-4 text-white  ajax form-control" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
              </div>
            {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
 