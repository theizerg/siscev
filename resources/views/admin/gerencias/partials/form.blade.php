<div class="row">
      <div class="col-sm-12">
         <div class="form-group">
          <label>Código de nónima</label>
            {{ Form:: text('codigo_nomina',null,['class'=>'form-control','placeholder' => 'Código de nónima','id'=>'codigo_nomina']) }}
            
          </div>
   
         <div class="form-group">
          <label>Nombre de la gerencia</label>
            {{ Form:: text('descricion',null,['class'=>'form-control','placeholder' => 'Nombre de la gerencia','id'=>'descricion']) }}
            
          </div>
       
         <div class="form-group">
          <label>Fecha de creación de la gerencia</label>
            {{ Form:: date('fecha_registro',null,['class'=>'form-control','placeholder' => 'Fecha de creación de la gerencia','id'=>'fecha_registro']) }}
            
          </div>
     
      <div class="col-sm-12">
          <button type="submit" class="btn blue darken-4 form-control text-white">
              Guardar gerencia
          </button>
      </div>
  </div>