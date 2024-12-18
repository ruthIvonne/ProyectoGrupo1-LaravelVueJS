<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
   


</head>
<body>
    <div class="container">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Crud Cursos<i class="bi bi-laptop"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Cursos.index') }}">Lista de Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Cursos.create') }}">Crear Curso</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Cursos.catalogo') }}">Catalogo</a>
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
</body>
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Talentos Digitales -Grupo1 Gonzalo- Ruth - Esteban
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024.</strong> Todos los derechos reservados.
</footer>

</html>

