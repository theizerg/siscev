<html>
 <head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>BANDES - @yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/system.css')}}">
  <link rel="stylesheet" href="{{asset('css/some.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('images/logo/logo-login.png')}}' />
  @stack('styles')
</head>
 
 <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light green-gradient-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

        </li>
        <li class="nav-item d-none d-sm-inline-block">

        </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <div class="input-group-append">
            </div>
        </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <li class="dropdown user user-menu" >
                    <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown">
                    <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                    <span class="fa fa fa-user mr-3"></span>
                    <span class="hidden-xs">{{ Auth::user()->display_name}} </span>
                    </a>
                    <ul class="dropdown-menu text-white">
                    <li class="user-header green darken-3">
                       <!-- <img src="{{ asset('images/user/user1-128x128.jpg') }}" class="img-circle" alt="User Image">-->
                        <i class="fa fa-user fa-5x" style="color:#fff;"></i>
                        <p>
                        {{ Auth::user()->display_name }}
                        <br>
                        {{ Auth::user()->hasrole('Administrador') ? 'Administrador' : 'Usuario' }}



                        </p>
                    </li>
                    <li class="user-footer">
                      <div class="float-left">
                        <a href="{{ url('user', [Auth::user()->encode_id]) }}" class="btn btn-default btn-flat">
                            <i class="fa fa-eye"></i> Datos
                        </a>
                        </div>
                          <div class="float-right">
                        <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                            <i class="fas fa-sign-out-alt"></i> Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </div>
                    </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- Uncomment this line to activate the control right sidebar button
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                -->
                </ul>
            </div>
        </ul>
    </nav>
    <!-- /.navbar -->


        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="leftmenu">
            @include('layouts.partials.leftmenu')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
            <h1 class="ml-3">
                @yield('page_title')
                <small>@yield('page_subtitle')</small>
            </h1>
            <ol class="breadcrumb float-sm-right">

                @show
            </ol>
            </section>



            <!-- Main content -->
            <section class="content container-fluid">
            <!--Page Content Here -->
            @yield('content')
             @include('layouts.partials.modal.personal.createpersonal')
            @include('layouts.partials.modal.usuario.createmodal')
            @include('layouts.partials.modal.roles.createrole')
            @include('layouts.partials.modal.gerencias.creategerencia')
           
            </section>
        </div>

        

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right hidden-xs">
            {{ env('APP_NAME') }}
            </div>
            <strong>Copyright &copy; 2020 <a href="#">{{ env('APP_NAME') }}</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <!-- Uncomment this line to activate the control right sidebar menu
      
        -->
        </div>

        <!-- REQUIRED JS SCRIPTS --> 
        <!-- jQuery -->
        <script src="{{asset('js/app.js')}}"></script>
       
        <script src="{{asset('js/some.js')}}"></script>
        <script src="{{ asset('js/system.js') }}"></script>
        <script>
            $('.select2').select2()
        </script>
         <script>

         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type', 'info') }}";
         switch(type){
             case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;

             case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                 break;

             case 'success':
                 toastr.success("{{ Session::get('message') }}");
                 break;

             case 'error':
                 toastr.error("{{ Session::get('message') }}");
                 break;
         }
     @endif
     </script>
        @stack('scripts')

        <style>

        #sidebar{


                
                }


        #opciones{

                    background: #2B89D2;


                }


        </style>
    </body>
</html>
