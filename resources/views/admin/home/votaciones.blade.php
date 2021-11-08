@extends('layouts.admin')
@section('title', 'Log del sistema')
@section('content')

<div class="container">
		@php
       $ente = App\Models\Ente::find($id)
     @endphp

        <div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header  ">
              <h5>Buscar por gerencia ( {{ $ente->descripcion }} )</h5>
             
            </div>
             <!-- /.card-header -->
                 <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                   
                {!! Form::open(['url' => ['/resultado/votantes'],'method' => 'POST','id'=>'marca']) !!}
                 <div class="row">
                   <div class="col-sm-12">
                   
                    <label for="">Buscar resultados por gerencia</label>
                      <select name="estado_id" placeholder="Selecione una gerencia" class="form-control input-sm select2">
                      	<option value="0">Seleccione la gerencia</option>
                      	@foreach ($gerencias as $element)
                      		<option value="{{ $element->id }}">{{ $element->descricion }}</option>
                      	@endforeach
                      </select>
                   </div>
                   <input type="hidden" name="ente_id" value="{{ $id }}">
                 </div>
                 <div class="col-sm-12 mt-5">
                    <button type="submit" class="btn blue darken-4 form-control text-white">
                        Buscar
                    </button>
                </div>
                 {!! Form::close() !!}
                </div>
              </div>
            </div>
            </div>
        </div>
   
@endsection
