<!-- Nombre -->
<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<!-- Apellido -->
<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $user->apellido ?? '') }}" required>
</div>

<!-- Correo Electrónico -->
<div class="mb-3">
    <label for="email" class="form-label">Correo Electrónico</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<!-- Contraseña -->
<div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password">
    <small class="text-muted">Deja en blanco si no deseas cambiar la contraseña.</small>
</div>

<!-- Confirmar Contraseña -->
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
</div>

<!-- Biografía -->
<div class="mb-3">
    <label for="biografia" class="form-label">Biografía</label>
    <textarea class="form-control" id="biografia" name="biografia">{{ old('biografia', $user->biografia ?? '') }}</textarea>
</div>

<!-- Foto de perfil -->
<div class="mb-3">
    <label for="foto_perfil" class="form-label">Foto de perfil</label>
    <input type="file" class="form-control" id="foto_perfil" name="foto_perfil">
</div>

<!-- Rol -->
<div class="mb-3">
    <label for="rol" class="form-label">Rol</label>
    <select class="form-select" id="rol" name="rol">
        <option value="alumno" {{ old('rol', $user->rol ?? '') == 'alumno' ? 'selected' : '' }}>Alumno</option>
        <option value="docente" {{ old('rol', $user->rol ?? '') == 'docente' ? 'selected' : '' }}>Docente</option>
        <option value="administrador" {{ old('rol', $user->rol ?? '') == 'administrador' ? 'selected' : '' }}>Administrador</option>
    </select>
</div>
