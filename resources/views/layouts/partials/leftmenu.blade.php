 <!-- Brand Logo -->
    <a href="{{url ('/') }}" class="brand-link">
      <img src="{{ asset('images/logo/logo-login.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>
     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/avatar/user1.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/') }}" class="d-block text-center"> {{ Auth::user()->full_name }}</a>
          <small class="text-center text-white ml-5">
            {{ Auth::user()->hasrole('Administrador') ? 'Administrador' : 'Usuario' }}
          </small><br>
          <small class="text-white">
            Miembro desde el año {{ Auth::user()->created_at->format('Y') }}</small>
        </div>
      </div>
    <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-header">OPCIONES</li>


        <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Administración
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>


          <ul class="nav nav-treeview">
           <li class="nav-item has-treeview">
           
        </ul>
        <ul class="nav nav-treeview ">
           <li class="nav-item has-treeview menu-open">
             @can('VerUsuario')
                <a href="/user" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Mostrar usuarios</p>
                </a>
          </li>
          @endcan
        </ul>
        </li>
        @can('VerRole')
          <li class="nav-item has-treeview ">
             <a href="/roles/create" class="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                 <p>Mostrar roles</p>
              </a>
             
          </li>
          @endcan
          @can('VerLogins')
           <li class="nav-item has-treeview ">
             <a href="/logins" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>Inicios de sesión</p>
              </a>
          </li>
          @endcan
           @can('VerGerencia')
           <li class="nav-item has-treeview ">
             <a href="/gerencias" class="nav-link">
                  <i class="mdi mdi-bank nav-icon"></i>
                  <p>Mostrar gerencias</p>
              </a>
          </li>
          @endcan
           @can('VerPersonal')
           <li class="nav-item has-treeview ">
             <a href="/personal" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Mostrar personal</p>
              </a>
          </li>
          @endcan
         
          
          
          
      
          
           </ul>
        </ul>


      </li>

       </li>
    </ul>
</nav>

    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
