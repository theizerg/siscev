

              <div class="row">
               <div class="col-sm-12">
                 

                 
                  
                  
                </div>

                <div class="col-sm-4">
                   <div class="form-group">
                  <label>Nombre </label>
                    {{ Form:: text('tx_nombres',null,['class'=>'form-control','placeholder' => 'Nombre ','required']) }}
                    
                  </div>
                </div>
              <div class="col-sm-4">
               
                  <label>Apellido </label>
                    {{ Form:: text('tx_apellidos',null,['class'=>'form-control','placeholder' => 'Apellido ','required']) }}
                    
                  </div>
                   <div class="col-sm-4">
                  <label>Cédula </label>
                    {{ Form:: text('cedula',null,['class'=>'form-control','placeholder' => 'Cédula ','required']) }}
                  </div>
                   <div class="col-sm-6">
                  <label>Teléfono </label>
                    {{ Form:: text('telefono',null,['class'=>'form-control','placeholder' => 'Teléfono ','required']) }}
                  </div>
                   <div class="col-sm-6">
                  <label>Centro electoral</label>
                    {{ Form:: text('centro_electoral',null,['class'=>'form-control','placeholder' => 'Centro electoral ','required']) }}
                  </div>
                   @php
                  $estados = App\Models\Estado::get()
                @endphp
                  <div class="col-sm-4">
                  <label class="font-weight-bolder" for="empresa">Estados del país</label>
                 <select name="estado_id" id="estados_id" class="form-control select2">
                  <option value="0">Seleccione</option>
                   @foreach ($estados as $value)
                     <option value="{{ $value->id }} "> {{ $value->name }}</option>
                   @endforeach
                 </select>
                </div>
                 <div class="col-sm-4">
                  <label class="font-weight-bolder" for="empresa">Municipios del país</label>
                 <select name="municipio_id" id="municipio_id" class="form-control">
                  <option value="0" disable="true" selected="true"></option>
                  
                 </select>
                </div>
                  <div class="col-sm-4">
                  <label class="font-weight-bolder" for="empresa">Parroquias del país</label>
                 <select name="parroquia_id" id="parroquia_id" class="form-control">
                  <option value="0" disable="true" selected="true"></option>
                  
                 </select>
                </div>

                <br><br><br><br>
               <button type="submit" class="btn green darken-4 text-white  form-control" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>