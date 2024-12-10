@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tus Cursos Asignados</h1>
    @if($cursos->isEmpty())
        <p>No tienes cursos asignados actualmente.</p>
    @else
        <ul class="list-group">
            @foreach($cursos as $curso)
                <li class="list-group-item">
                    <strong>{{ $curso->titulo }}</strong><br>
                    Institución: {{ $curso->institucion }}<br>
                    Categoría: {{ $curso->categoria->nombre ?? 'Sin categoría' }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
