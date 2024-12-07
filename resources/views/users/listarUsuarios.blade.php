@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Listado de Usuarios</h2>

    @if ($users->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}">
                                {{ $user->id }}
                            </a>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->rol) }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron usuarios.</p>
    @endif

    <div class="mt-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Nuevo Usuario</a>
    </div>

    <!-- Enlaces de paginación -->
    <div class="mt-3">
        {{ $users->links() }}
    </div>
</div>
@endsection
