@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Datos')

@section('content')

<section class="invoice">
  <div class="card">
    <div class="card-header blue-gradient-dark text-white outline-primary">
      <p class="text-white " style="font-size: 30px;">
         <i class="fa fa-user"></i> Datos de usuario
        <small class="float-right" style="font-size: 25px;">{{ $user->display_name }}</small>
      </p>
    </div>
    <div class="card-body">
  <div class="row invoice-info">
    <div class="col-sm-3 invoice-col">
      <strong>Nombre</strong><br>
        {{ $user->full_name }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Correo electrónico</strong>
      <br>
      {{ $user->email }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Estatus</strong><br>
      <span class="badge text-white {{ $user->status ? 'green' : 'red' }}">{{ $user->display_status }}</span>
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Tipo de usuario</strong><br>
      {{ Auth::user()->hasrole('Administrador') ? 'Administrador' : 'Usuario' }}
    </div>
  </div>
  <br>
  <div class="row invoice-info">
    <div class="col-sm-3 invoice-col">
      <strong>Contraseña</strong><br>
      ********
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Creado</strong>
      <br>
      {{ $user->created_at }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Actualizado</strong><br>
      {{ $user->updated_at }}
    </div>
    <div class="col-sm-3 invoice-col">
      <strong>Logins</strong><br>
      <i class="fa fa-eye"></i> <a href="{{ url('logins', [$user->encode_id]) }}">logins</a>
    </div>
  </div>
  <br>
  <div class="row invoice-info">
    <div class="col-sm-9 invoice-col">
      <strong>Permisos de usuario</strong><br>
      @foreach($user->getAllPermissions() as $permission)
      <span class="badge">{{  trans('permission.'.$permission->name) }}</span>&nbsp;&nbsp;
      @endforeach
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-6">
      <div class="btn-group">
        @can('EditarUsuario')
        <a href="{{ url('user', [$user->encode_id, 'edit']) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
        @endcan
      </div>
    </div>
  </div>
    </div>
  </div>
</section>

@endsection
