@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear Categoría') }}</div>

                <div class="card-body">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre_categoria">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
