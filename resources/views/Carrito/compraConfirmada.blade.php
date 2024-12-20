@extends('layoutsEsteban.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>¡Compra Confirmada!</h2>
        </div>
        <div class="card-body">
            <p class="text-success text-center">Tu compra se ha realizado exitosamente.</p>

            <div class="alert alert-info">
                <strong>Resumen de Compra:</strong>
            </div>

            <div class="mb-4">
                <h5>Compra ID: {{ $compra->id }}</h5>
                <h5>Fecha: {{ $compra->created_at->format('d/m/Y H:i') }}</h5>
                <h5>Cantidad de cursos: {{ $compra->cantidad }}</h5>
                <h5>Total pagado: ${{ number_format($compra->total, 2) }}</h5>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-primary text-center">
                        <th>Curso</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compra->detalles as $detalle)
                    <tr>
                        <td>{{ $detalle->curso->nombre ?? 'Curso no disponible' }}</td>
                        <td class="text-center">${{ number_format($detalle->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="{{ route('Cursos.index') }}" class="btn btn-primary">Volver al catálogo</a>
                <a href="{{ route('perfil.compras') }}" class="btn btn-secondary">Ver mis compras</a>
            </div>
        </div>
    </div>
</div>
@endsection
