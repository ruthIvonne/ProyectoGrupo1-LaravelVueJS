@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Cursos Comprados</h1>
    <ul>
        @forelse ($cursos as $curso)
            <li>{{ $curso->nombre }} - {{ $curso->descripcion }}</li>
        @empty
            <p>No has comprado ningún curso.</p>
        @endforelse
    </ul>
</div>
@endsection
