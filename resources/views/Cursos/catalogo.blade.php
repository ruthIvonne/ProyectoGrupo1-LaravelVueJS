@extends('layouts.app')

@section('content')
<div class="catalog-container my-5">
    <h1 class="text-center mb-4 catalog-title"><i class="bi bi-list-check"></i>
        Catálogo de Cursos</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($cursos as $curso)
        <div class="col">
            <div class="card h-100 shadow tech-card">
                <!-- Imagen del curso -->
                <img src="{{ $curso->video_url }}" class="card-img-top" alt="{{ $curso->titulo }}">
                <div class="card-body">
                    <!-- Ícono y Título del curso -->
                    <h5 class="card-title text-truncate">
                        <i class="bi bi-laptop"></i> {{ $curso->titulo }}
                    </h5>
                    <!-- Institución -->
                    <p class="card-text text-muted small"><i class="bi bi-building"></i> {{ $curso->institucion }}</p>
                    <!-- Duración -->
                    <p class="card-text"><i class="bi bi-clock"></i> {{ $curso->duracion }}</p>
                    <!-- Precio -->
                    <p class="card-text fw-bold text-success"><i class="bi bi-currency-dollar"></i> {{ number_format($curso->precio, 2) }}</p>
                </div>
                <div class="card-footer bg-dark text-center">
                    <!-- Mostrar si el curso está disponible o no -->
                    @if ($curso->estado == 1)
                        <span class="badge bg-success text-white">Disponible</span>
                        <a href="{{ route('Cursos.show', $curso->id) }}" class="btn btn-light tech-btn w-100">Ver detalle curso</a>
                    @else
                        <span class="badge bg-danger text-white">No disponible</span>
                        <a href="#" class="btn btn-light tech-btn w-100 disabled">Ver detalle curso</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if($cursos->isEmpty())
<div class="alert alert-warning text-center">No hay cursos disponibles en este momento.</div>
@endif
@endsection


