<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABQdD1Nf2tVFC6Zc47z9i5k5AA1jrl9DbpXqYnF6z8k2jFv6tnO1+4E" crossorigin="anonymous">
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/styleCurso.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href={{ url('css/app.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"
   


</head>
<body>
    <div class="container">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            @auth
            <!-- Menú para Administrador -->
            @if(Auth::user()->rol === 'administrador')
            <a class="navbar-brand" href="#">Crud Cursos<i class="bi bi-laptop"></i> </a>
            @endif
            @endauth
            @auth
             <!-- Menú para Docente -->
            @if(Auth::user()->rol === 'docente')
            <a class="navbar-brand" href="#">Cursos Nivel Profecional<i class="bi bi-laptop"></i> </a>
            @endif
            @endauth
            @auth
            <!-- Menú para Docente -->
           @if(Auth::user()->rol === 'alumno')
           <a class="navbar-brand" href="#">Cursos<i class="bi bi-laptop"></i> </a>
           @endauth
           @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                    <!-- Menú para Administrador -->
                    @if(Auth::user()->rol === 'administrador')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Cursos.index') }}">Lista de Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Cursos.create') }}">Crear Curso</a>
                    </li>
                    @endif
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Cursos.catalogo') }}">Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Cart.cart') }}">SHOP</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                           href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"
                        >
                            <span class="badge badge-pill badge-dark">
                                <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                            </span>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                            <ul class="list-group" style="margin: 20px;">
                                @include('partials.cart-drop')
                            </ul> 
    
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Contenido de la página -->
        <div class="mt-4">
            @yield('content') <!-- Aquí se inyectará el contenido de cada vista -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0lLxw5E1bDsbkA0a8uKwz0jRFqZTlhkpu5mFkz9hWwFS9x6P" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</body>


</html>

