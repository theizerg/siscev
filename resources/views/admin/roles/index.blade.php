@extends('layouts.admin')
@section('title','Roles')
@section('page_title', 'Listado de Roles')
@section('content')

      <div class="container">
        <div class="col-md-6">
          <div class="btn-group">
           
           @can('RegistrarRole')
            <div class="btn-group">
             <button type="button" class="btn btn-primary blue darken-4 mb-4" data-toggle="modal" data-target="#createModalRole"><i class="fa fa-plus-square"></i> Agregar role </button>
             </div><br> 
           @endcan
          </div>
        </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header  ">
              <h5>Listado de roles</h5>
             
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
                      <a href="/user" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/user/create" class="link_ruta">
                        Nuevo
                      </a>
                    </li>
                  </ul><br>
               <table  class="display table table-striped " id="tableExport" style="width:100%">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Usuarios que están usando el Role</th>
                    
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                    <tr class="row{{ $role->id }}">
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->count_user }}</td>
                    
                    <td>
                      @can('EditarRole')
                       <a class="btn btn-round blue darken-4" data-toggle="tooltip" data-placement="top"
                      title="Asignar permisos." href="{{ url('permission', [$role->name]) }}"><i class="mdi mdi-lock text-center text-white"></i> </a>
                     @endcan
                       
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
   
      </div>

      </div>

@endsection