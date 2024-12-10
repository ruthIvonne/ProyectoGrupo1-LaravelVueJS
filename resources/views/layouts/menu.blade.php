<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><br>PLATAFORMA EDUCATIVA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name ?? 'Guest' }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      @auth
        <!-- Menú para Administrador -->
        @if(Auth::user()->rol === 'administrador')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                CURSOS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cursos.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Curso</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cursos.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Cursos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                USUARIOS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                CATEGORÍAS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categorias.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nueva Categoría</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categorias.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Categorías</p>
                </a>
              </li>
            </ul>
          </li>

        <!-- Menú para Docente -->
        @elseif(Auth::user()->rol === 'docente')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                PERFIL
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editar Perfil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                CURSOS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cursos.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cursos Asignados</p>
                </a>
              </li>
            </ul>
          </li>

        <!-- Menú para Alumno -->
        @elseif(Auth::user()->rol === 'alumno')
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                PERFIL
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editar Perfil</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                CURSOS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cursos.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Todos los Cursos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cursos.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buscar Cursos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cursos.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Cursos Comprados</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
      @endauth

        <!-- Menú para Guest -->
        @guest
          <li class="nav-item">
            <a href="{{ route('cursos.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Ver Todos los Cursos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-in-alt"></i>
              <p>Iniciar Sesión</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Registrarse</p>
            </a>
          </li>
        @endguest

        <!-- Logout -->
        @auth
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Cerrar Sesión</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        @endauth
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
