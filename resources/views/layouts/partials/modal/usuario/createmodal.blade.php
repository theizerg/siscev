<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
              <div class="modal-header">
                <h2 class="modal-title" id="formModal">Nuevo usuario</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {!! Form::open(['route' => ['user.store'],'method' => 'POST']) !!}
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group pading">
                        <label for="name">Nombres</label>
                        <input id="name" type="name" class="form-control" name="name"   autocomplete="name" autofocus placeholder="Nombres">
                       </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                       <label for="last_name">Apellidos</label>
                        <input id="lastname" type="lastname" class="form-control" name="lastname"   autocomplete="lastname" autofocus placeholder="Apellidos">
                     </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="last_name">Usuario</label>
                        <input id="username" type="username" class="form-control" name="username"  autocomplete="username" autofocus placeholder="Usuario">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="email">Correo Electrónico</label>
                        <input id="email" type="email" class="form-control "name="email"   autocomplete="email" autofocus placeholder="Contraseña">
                       </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="password">Nueva Contraseña</label>
                       <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}"  autocomplete="password" autofocus placeholder="Contraseña">
                      </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                         <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  autocomplete="password_confirmation" autofocus placeholder="Contraseña">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label  for="role">Tipo de usuario</label>
                          @php
                          $roles = Spatie\Permission\Models\Role::get();
                          @endphp
                          <div class="checkbox icheck">
                            <label class="font-weight-bolder">
                              @foreach($roles as $role)
                              <input type="radio" name="role" value="{{$role->name}}" checked> {{$role->name}}&nbsp;&nbsp;
                              @endforeach
                            </label>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    
                        <div class="form-group">
                          <label for="status">Acceso al sistema</label>
                          <div class="checkbox icheck">
                            <label>
                              <input type="radio" name="status" value="1"> Activo&nbsp;&nbsp;
                              <input type="radio" name="status" value="0"> Deshabilitado&nbsp;&nbsp;
                            </label>
                          </div>
                        </div>
                      
                    </div>
                  </div>  
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn blue darken-4 text-white btn-md ajax form-control" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
              </div>
            {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
  