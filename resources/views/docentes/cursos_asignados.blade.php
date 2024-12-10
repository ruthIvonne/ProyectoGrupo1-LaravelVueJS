@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Cursos Asignados</h1>
    <ul>
        @forelse ($cursos as $curso)
            <li>{{ $curso->nombre }} - {{ $curso->descripcion }}</li>
        @empty
            <p>No tienes cursos asignados.</p>
        @endforelse
    </ul>
</div>
@endsection
