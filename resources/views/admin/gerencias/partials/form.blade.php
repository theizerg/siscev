@php
  $entes = App\Models\Ente::pluck('descripcion','id')
@endphp
<div class="row">
       <div class="col-sm-6">
         <label>Ente  de la gerencia</label>
          {!! Form::select('ente_id', $entes, null,array('class' => 'form-control input-sm select2','placeholder'=>'Selecione un ente','data-width'=>'100%')) !!}   
       </div>
         <div class="col-sm-6">
         <div class="form-group">
          <label>Nombre de la gerencia</label>
            {{ Form:: text('descricion',null,['class'=>'form-control','placeholder' => 'Nombre de la gerencia']) }}
            
          </div>
       </div> 
     
      <div class="col-sm-12">
          <button type="submit" class="btn blue darken-4 form-control text-white">
              Guardar gerencia
          </button>
      </div>
 </div>
 