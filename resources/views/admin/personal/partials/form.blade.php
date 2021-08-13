<div class="row">
      <div class="col-sm-12">
      
   
         <div class="form-group">
          <label>Nombre del empleado</label>
            {{ Form:: text('tx_nombres',null,['class'=>'form-control','placeholder' => 'Nombre del empleado','id'=>'tx_nombres','required']) }}
            
          </div>
       
        <div class="form-group">
          <label>Apellido del empleado</label>
            {{ Form:: text('tx_apellidos',null,['class'=>'form-control','placeholder' => 'Apellido del empleado','id'=>'tx_apellidos','required']) }}
            
          </div>
          <div class="form-group">
          <label>Cédula del empleado</label>
            {{ Form:: text('cedula',null,['class'=>'form-control','placeholder' => 'Cédula del empleado','id'=>'cedula','required']) }}
          </div>
            @php
              $gerencias = App\Models\Gerencias::pluck('descricion','id')
            @endphp
          <div class="form-group">
           
          <label>Gerencia del empleado</label>
           
       
           {!! Form::select('estado_id', $gerencias, null,array('class' => 'form-control input-sm select2','placeholder'=>'Selecione una gerencia','data-width'=>'100%')) !!}    
     
          </div>

          <div class="form-group">
                <label for="status_id">Estado del empleado</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status_id" value="1" checked> Activo&nbsp;&nbsp;
                    <input type="radio" name="status_id" value="2"> Jubilado
                  </label>
                </div>
              </div>

      <div class="col-sm-12">
          <button type="submit" class="btn blue darken-4 form-control text-white">
              Guardar empleado
          </button>
      </div>
  </div>

  