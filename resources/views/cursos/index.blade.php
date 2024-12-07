@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Cursos</h2>
        <a href="{{ route('cursos.create') }}" class="btn btn-primary">Crear Curso</a>

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
                        <td>{{ $curso->titulo }}</td>
                        <td>{{ $curso->institucion }}</td>
                        <td>{{ $curso->plan_de_estudio }}</td>
                        <td>{{ $curso->duracion }}</td>
                        <td>{{ $curso->precio }}</td>
                        <td>
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
