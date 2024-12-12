@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                 @csrf
                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <!-- Apellido -->
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <!-- Biografía (opcional) -->
                    <div class="mb-3">
                        <label for="biografia" class="form-label">Biografía</label>
                        <textarea class="form-control" id="biografia" name="biografia">{{ old('biografia') }}</textarea>
                    </div>

                    <!-- Foto de perfil (opcional) -->
                    <div class="mb-3">
                        <label for="foto_perfil" class="form-label">Foto de perfil</label>
                        <input type="file" class="form-control" id="foto_perfil" name="foto_perfil">
                    </div>

                    <!-- Rol -->
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="rol" name="rol">
                            <option value="alumno" selected>Alumno</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <footer class="container">
        @yield('Footer')
    </footer>
</div>
@endsection