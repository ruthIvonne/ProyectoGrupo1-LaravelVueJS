@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4"><i class="bi bi-person-bookmark"></i>
  Modificar Curso</h1>
<div class="container">
  <!-- Formulario con método POST y el campo _method que indica PUT -->
  <form id="form-curso" class="form-curso" method="POST" action="{{ route('Cursos.update', $curso->id) }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">

    <!-- Campos del formulario -->
    <div class="row">
        <!-- Título del Curso -->
        <div class="col-md-6 mb-3">
            <label for="titulo" class="form-label">Título del Curso</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $curso->titulo }}" required>
        </div>

        <!-- Institución -->
        <div class="col-md-6 mb-3">
            <label for="institucion" class="form-label">Institución</label>
            <input type="text" class="form-control" id="institucion" name="institucion" value="{{ $curso->institucion }}" required>
        </div>
    </div>

    <div class="row">
        <!-- Plan de Estudio -->
        <div class="col-12 mb-3">
            <label for="plan_de_estudio" class="form-label">Plan de Estudio</label>
            <textarea class="form-control" id="plan_de_estudio" name="plan_de_estudio" required rows="4">{{ $curso->plan_de_estudio }}</textarea>
        </div>
    </div>

    <div class="row">
        <!-- Duración -->
        <div class="col-md-6 mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" class="form-control" id="duracion" name="duracion" value="{{ $curso->duracion }}" required>
        </div>

        <!-- Certificados -->
        <div class="col-md-6 mb-3">
            <label for="certificados" class="form-label">Certificados</label>
            <input type="text" class="form-control" id="certificados" name="certificados" value="{{ $curso->certificados }}" required>
        </div>
    </div>

    <div class="row">
        <!-- Precio -->
        <div class="col-md-6 mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ $curso->precio }}" required>
        </div>

        <!-- URL del Video -->
        <div class="col-md-6 mb-3">
            <label for="video_url" class="form-label">URL del Video</label>
            <input type="url" class="form-control" id="video_url" name="video_url" value="{{ $curso->video_url }}">
        </div>
    </div>

    <!-- Categoría -->
    <div class="col-md-6 mb-3">
      <label for="categoria_id" class="form-label">Categoría</label>
      <select class="form-control" id="categoria_id" name="categoria_id" required>
          @foreach($categorias as $categoria)
          <option value="{{ $categoria->categoria_id }}" {{ $curso->categoria_id == $categoria->categoria_id ? 'selected' : '' }}>
              {{ $categoria->nombre_categoria }}
          </option>
          @endforeach
      </select>
    </div>

    <!-- Botón de envío -->
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary" id="submit-btn">Modificar Curso</button>
    </div>
  </form>
</div>

<script>
    // Lógica JavaScript para enviar el formulario con axios
    document.getElementById('form-curso').addEventListener('submit', async function (e) {
        e.preventDefault(); // Prevenir el envío del formulario de forma tradicional
        const form = document.getElementById('form-curso');
        const formData = new FormData(form);

        try {
            // Enviar la solicitud PUT usando axios
            const response = await axios.put('{{ route('Cursos.update', $curso->id) }}', formData);

            // Mostrar mensaje de éxito
            alert('Curso modificado con éxito');
        } catch (error) {
            // Manejo de errores
            console.error('Error:', error);
            alert('Ocurrió un error al modificar el curso');
        }
    });
</script>

@endsection



        