@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listar Usuarios') }}</div>

                <div class="card-body">

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
                        @auth
                        @if(Auth::user()->rol === 'administrador')   
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @elseif(Auth::user()->rol === 'docente')
                        <a href="{{ route('users.index') }}" class="btn btn-warning">Calificar</a>
                        @endif
                        @endauth   
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron usuarios.</p>
    @endif
    @auth
    @if(Auth::user()->rol === 'administrador') 
    <div class="mt-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Nuevo Usuario</a>
    </div>
    @endif
    @endauth  

    <!-- Enlaces de paginación -->
    <div class="mt-3">
        {{ $users->links() }}
    </div>
 
</div>
@endsection