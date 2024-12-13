<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Cursos') }}</div>

                <div class="card-body">
        
                @auth
                @if(Auth::user()->rol === 'administrador')
                <a href="{{ route('cursos.create') }}" class="btn btn-primary">Crear Curso</a>
                @endif
                @endauth
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Institución</th>
                            <th>Plan de Estudio</th>
                            <th>Duración</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $curso->titulo }}</td>
                        <td>{{ $curso->institucion }}</td>
                        <td>{{ $curso->duracion }}</td>
                        <td>${{ number_format($curso->precio, 2) }}</td>
                        <td>
                        @auth
                        @if(Auth::user()->rol === 'administrador')   
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @elseif(Auth::user()->rol === 'alumno')
                        <a href="{{ route('cursos.index') }}" class="btn btn-warning">Comprar</a>
                        @elseif(Auth::user()->rol === 'docente')
                        <a href="{{ route('users.index') }}" class="btn btn-warning">Alumnos inscriptos</a>
                        @endif
                        @endauth    
                        </td>
                    </tr>
                @endforeach
                    </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection


