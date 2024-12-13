<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4"><i class="bi bi-book"></i>
        Listado de Cursos</h1>

    <!-- Mensaje de éxito (si lo hay) -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabla de Cursos -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Título del Curso</th>
                    <th>Institución</th>
                    <th>Duración</th>
                    <th>Precio</th>
                    <th>Estado del curso</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cursos as $curso)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $curso->titulo }}</td>
                        <td>{{ $curso->institucion }}</td>
                        <td>{{ $curso->duracion }}</td>
                        <td>${{ number_format($curso->precio, 2) }}</td>
                        <td>
                            <!-- Mostrar el estado actual del curso -->
                            @if ($curso->estado == 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Botones de Acción -->
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('Cursos.edit', $curso->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                 <!-- Mostrar el botón según el estado del curso -->
                                                            <!-- Mostrar el botón según el estado del curso -->
                                        @if ($curso->estado == 1)
                                        <!-- Botón "Eliminar" si el curso está activo -->
                                        <a href="{{ route('Cursos.toggleEstado', $curso->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este curso?');">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </a>
                                    @else
                                        <!-- Botón "Habilitar" si el curso está inactivo -->
                                        <a href="{{ route('Cursos.toggleEstado', $curso->id) }}" class="btn btn-success btn-sm" onclick="return confirm('¿Estás seguro de habilitar este curso?');">
                                            <i class="bi bi-toggle-on"></i> Habilitar
                                        </a>
                                    @endif
                                <!-- este boton hace la eliminacion fisica del curso
                                <form action="{{ route('Cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este curso?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>-->
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay cursos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


