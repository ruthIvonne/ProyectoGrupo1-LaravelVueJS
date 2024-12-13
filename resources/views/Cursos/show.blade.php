<!-- resources/views/dashboard/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <!-- Encabezado -->
                <div class="card-header text-center bg-gradient-primary text-white">
                    <h2>{{ $curso->titulo }}</h2>
                </div>
                <!-- Cuerpo de la tarjeta -->
                <div class="card-body bg-light">
                    <img src="{{ $curso->video_url }}" class="card-img-top" alt="{{ $curso->titulo }}">
                    <p><strong>Institución:</strong> {{ $curso->institucion }}</p>
                    <p><strong>Plan de Estudio:</strong> {{ $curso->plan_de_estudio }}</p>
                    <p><strong>Duración:</strong> {{ $curso->duracion }}</p>
                    <p><strong>Certificados:</strong> {{ $curso->certificados }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($curso->precio, 2) }}</p>
                    <p><strong>Categoría:</strong> {{ $curso->categoria->nombre_categoria ?? 'Sin categoría' }}</p>

                    <p>
                        <strong>Video Informativo:</strong>
                        <a href="{{ $curso->video_url }}" target="_blank" class="btn btn-link">Ver Video</a>
                    </p>
                   

                </div>
                <!-- Pie de tarjeta -->
                <div class="card-footer d-flex justify-content-between align-items-center bg-dark text-white">
                    <!-- Botón para volver al catálogo -->
                    <a href="{{ route('Cursos.catalogo') }}" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Volver al catálogo
                    </a>
                    <!-- Botón para agregar al carrito -->
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $curso->id }}">
                        <input type="hidden" name="name" value="{{ $curso->titulo }}">
                        <input type="hidden" name="price" value="{{ $curso->precio }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="attributes[slug]" value="{{ $curso->slug }}">
                        <input type="hidden" name="attributes[image]" value="{{ $curso->imagen }}">
                        
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-cart-plus"></i> Agregar al carrito
                        </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


