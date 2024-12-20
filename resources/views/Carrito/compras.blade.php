@extends('layoutsEsteban.app')

@section('content')
<div class="container" style="margin-top: 80px;">
    <h2>Mis Compras</h2>
    @if($compras->isEmpty())
        <p>No tienes compras registradas.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Cursos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{ $compra->id }}</td>
                        <td>{{ $compra->cantidad }}</td>
                        <td>${{ $compra->detalles->sum('total') }}</td>
                        <td>
                            <ul>
                                @foreach($compra->detalles as $detalle)
                                    <li>{{ $detalle->curso->nombre ?? 'Curso desconocido' }}: ${{ $detalle->total }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
