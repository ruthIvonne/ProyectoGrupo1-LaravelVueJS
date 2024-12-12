<!-- resources/views/dashboard/create.blade.php -->

@extends('layouts.app')
@section('content')
<h1 class="text-center mb-4"><i class="bi bi-person-bookmark"></i>
    Crear un nuevo Curso</h1>
<div class="container">
    @section('content')
    <h1 class="text-center mb-4">Crear un nuevo Curso</h1>
    <div class="container">
        <form id="form-curso" class="form-curso" method="POST" action="{{ route('Cursos.store') }}">
            @csrf
            <div class="row">
                <!-- Título del Curso -->
                <div class="col-md-6 mb-3">
                    <label for="titulo" class="form-label">Título del Curso</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
    
                <!-- Institución -->
                <div class="col-md-6 mb-3">
                    <label for="institucion" class="form-label">Institución</label>
                    <input type="text" class="form-control" id="institucion" name="institucion" required>
                </div>
            </div>
    
            <div class="row">
                <!-- Plan de Estudio -->
                <div class="col-12 mb-3">
                    <label for="plan_de_estudio" class="form-label">Plan de Estudio</label>
                    <textarea class="form-control" id="plan_de_estudio" name="plan_de_estudio" required rows="4"></textarea>
                </div>
            </div>
    
            <div class="row">
                <!-- Duración -->
                <div class="col-md-6 mb-3">
                    <label for="duracion" class="form-label">Duración</label>
                    <input type="text" class="form-control" id="duracion" name="duracion" required>
                </div>
    
                <!-- Certificados -->
                <div class="col-md-6 mb-3">
                    <label for="certificados" class="form-label">Certificados</label>
                    <input type="text" class="form-control" id="certificados" name="certificados" required>
                </div>
            </div>
    
            <div class="row">
                <!-- Precio -->
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required>
                </div>
    
                <!-- URL del Video -->
                <div class="col-md-6 mb-3">
                    <label for="video_url" class="form-label">URL del Video</label>
                    <input type="url" class="form-control" id="video_url" name="video_url">
                </div>
            </div>
    
            
                <!-- Categoría -->
                <div class="col-md-6 mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select class="form-control" id="categoria_id" name="categoria_id" required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre_categoria }}</option>
                        @endforeach
                    </select>
                </div>
           
    
            <!-- Botón de envío -->
            <div class="text-center mt-4">
                
                <button type="submit" class="btn btn-submit" id="submit-btn">Crear Curso</button>
            </div>
        </form>
    </div>
    @endsection
    
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
   document.querySelector('.btn-submit').addEventListener('click', function() {
    var form = document.getElementById('form-curso');
    var formData = new FormData(form);

    axios.post('{{ route('Cursos.store') }}', formData)
    .then(function (response) {
        alert('Curso creado con éxito');
    })
    .catch(function (error) {
        if (error.response) {
            console.error('Error:', error.response.data);
            alert('Error al crear el curso: ' + error.response.data.message);
        } else if (error.request) {
            console.error('Error en la solicitud:', error.request);
            alert('Error de red al crear el curso');
        } else {
            console.error('Error general:', error.message);
            alert('Error al crear el curso: ' + error.message);
        }
    });
});

</script>
@endsection


