@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Curso</h2>
        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf

            <!-- Título -->
            <div class="form-group">
                <label for="titulo">Título del Curso</label>
                <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required>
                @error('titulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Institución -->
            <div class="form-group">
                <label for="institucion">Institución</label>
                <input type="text" name="institucion" class="form-control @error('institucion') is-invalid @enderror" value="{{ old('institucion') }}" required>
                @error('institucion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Plan de Estudio -->
            <div class="form-group">
                <label for="plan_de_estudio">Plan de Estudio</label>
                <textarea name="plan_de_estudio" class="form-control @error('plan_de_estudio') is-invalid @enderror" required>{{ old('plan_de_estudio') }}</textarea>
                @error('plan_de_estudio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Duración (en formato HH:MM:SS) -->
            <div class="form-group">
                <label for="duracion">Duración</label>
                <input type="time" name="duracion" class="form-control @error('duracion') is-invalid @enderror" value="{{ old('duracion', $curso->duracion) }}" placeholder="Ej: 02:30:00" required>
                @error('duracion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Certificados -->
            <div class="form-group">
                <label for="certificados">Certificados</label>
                <select name="certificados" class="form-control @error('certificados') is-invalid @enderror">
                    <option value="1" {{ old('certificados') == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('certificados') == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('certificados')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Precio -->
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') }}" required>
                @error('precio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Video URL -->
            <div class="form-group">
                <label for="video_url">URL del Video (Opcional)</label>
                <input type="url" name="video_url" class="form-control @error('video_url') is-invalid @enderror" value="{{ old('video_url') }}">
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Categoría -->
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Docente -->
            <div class="form-group">
                <label for="docente_id">Docente</label>
                <select name="docente_id" class="form-control @error('docente_id') is-invalid @enderror">
                    <option value="">Selecciona un docente</option>
                    @foreach($docentes as $docente)
                        <option value="{{ $docente->id }}" {{ old('docente_id') == $docente->id ? 'selected' : '' }}>{{ $docente->name }}</option>
                    @endforeach
                </select>
                @error('docente_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear Curso</button>
        </form>
    </div>
@endsection
