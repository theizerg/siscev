@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Listado general de las gerencias')
@section('content')

   
      <div class="container">
        <div class="col-md-6">
          <div class="btn-group">
           
           @can('RegistrarGerencia')
            <a href="{{ ('/gerencias/create') }}"  class="btn btn-lg green darken-4 disabled "><i class="mdi mdi-plus mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Registrar nueva orden de servicio.">Nueva gerencia</small></a>
           @endcan
           @can('VerGerencia')
            <a href="{{ ('/gerencias') }}"  class="btn btn-lg green darken-4 "><i class="mdi mdi-folder mt-2 text-white" ></i> <small class="text-white" data-toggle="tooltip" data-placement="top"
                            title="Registrar nueva orden de servicio.">Ver gerencia</small></a>
           @endcan
          </div>
        </div>
      <br>
      
 <div class="row">
      <div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header">
              <h5 >Agregar nueva gerencia</h5>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                     <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/gerencias" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/gerencias/create" class="link_ruta disabled">
                        Nuevo
                      </a>
                    </li>
                  </ul><br>
                    {!! Form::open(['route' => ['gerencias.store'],'method' => 'POST','id'=>'marca']) !!}

                    @include('admin.gerencias.partials.form')

                     {!! Form::close()!!}
                </div>
                <div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header">
              <h5 >Últimas gerencias registradas</h5>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                     <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/gerencias" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/gerencias/create" class="link_ruta disabled">
                        Nuevo
                      </a>
                    </li>
                  </ul><br><br><br>
                <table  class="display table table-striped" style="width:100%">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Código de nónima</th>
                    <th>Descripción</th>
                    <th>Fecha de registro</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $gerencias = App\Models\Gerencias::get();
                        @endphp
                    @foreach ($gerencias as $gerencia)
                    <tr class="row{{ $gerencia->id }}">
                    <td>{{ $gerencia->id }}</td>
                    <td>{{ $gerencia->codigo_nomina }}</td>
                    <td>{{ $gerencia->descricion }}</td>
               
                      
                     

                   
                    <td>{{ $gerencia->fecha_registro }}</td>
                    <td>
                      2
                       
                    </td>
                    </tr>
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
                <!-- /.card-body -->
            </div>

        </div>

    </div>
    

</div>
      
   



@endsection

