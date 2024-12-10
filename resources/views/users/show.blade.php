@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Detalles del Usuario</h4>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Apellido:</strong> {{ $user->apellido }}</p>
            <p><strong>Correo:</strong> {{ $user->email }}</p>
            <p><strong>Rol:</strong> {{ $user->rol }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection