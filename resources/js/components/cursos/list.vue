
<template>
    <div class="container my-5">
      <h1 class="text-center mb-4"><i class="bi bi-book"></i> Listado de Cursos</h1>
  
      <div class="table-responsive">
        <table class="table table-hover align-middle  table-sm table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Título del Curso</th>
              <th>Categoria</th>
              <th>Institución</th>
              <th>Duración</th>
              <th>Precio</th>
              <th>Estado del curso</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(curso, index) in cursos" :key="curso.id">
              <td>{{ index + 1 }}</td>
              <td>{{ curso.titulo }}</td>
              <td v-if="curso.categoria">{{ curso.categoria.nombre_categoria }}</td> <td v-else>No asignada</td>
              <td>{{ curso.institucion }}</td>
              <td>{{ curso.duracion }}</td>
              <td>${{ parseFloat(curso.precio).toFixed(2) }}</td>
              <td>{{ curso.estado === 1 ? 'Activo' : 'Inactivo' }}</td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                  <button
                    @click="editCurso(curso.id)"
                    class="btn btn-warning btn-sm"
                  >
                  <i class="bi bi-pencil-square fs-6"></i> <!-- Tamaño más pequeño -->
                  Editar
                  </button>


                  <button
                    v-if="curso.estado === 1"
                    class="btn btn-danger btn-sm fs-6"
                    :disabled="cargando === curso.id"
                    @click="toggleEstadoCurso(curso.id)"
                  >
                    <i v-if="cargando === curso.id" class="spinner-border spinner-border-sm fs-6"></i>
                    <i v-else class="bi bi-trash"></i><small>Eliminar</small>
                  </button>

                  <button
                    v-else
                    class="btn btn-success fs-6"
                    :disabled="cargando === curso.id"
                    @click="toggleEstadoCurso(curso.id)"
                  >
                    <i v-if="cargando === curso.id" class="spinner-border spinner-border-sm fs-6"></i>
                    <i v-else class="bi bi-toggle-on"></i><small>Habilitar</small>
                  </button>

                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  <!-- Controles de Paginación -->
  <div class="d-flex justify-content-center">
      <button
        v-for="page in cursos.last_page"
        :key="page"
        class="btn btn-sm mx-1"
        :class="{ 'btn-primary': currentPage === page, 'btn-light': currentPage !== page }"
        @click="goToPage(page)"
      >
        {{ page }}
      </button>
    </div>
  
  
  </template>
 
  <script>
  
import axios from 'axios';
import Swal from 'sweetalert2';


export default {
  props: ["cursos"], // La prop 'cursos' viene del padre, y debe incluir los datos de paginación
  data() {
    return {
      cargando: null, // ID del curso que está cambiando estado
      currentPage: this.cursos.current_page, // Página actual (asumiendo que tu backend devuelve esta estructura)
      lastPage: this.cursos.last_page, // Última página disponible
    };
  },
methods: {
  goToPage(page) {
      if (page < 1 || page > this.lastPage) return; // Validar límites de paginación
      axios.get(`/cursos?page=${page}`).then((response) => {
        this.$emit("update:cursos", response.data); // Actualizar los datos del padre
        this.currentPage = page; // Actualizar la página actual
      }).catch(error => {
        console.error("Error al cambiar de página:", error);
        Swal.fire("Error", "No se pudo cargar la página solicitada.", "error");
      });
    },
  toggleEstadoCurso(id) {
    if (confirm('¿Estás seguro de cambiar el estado de este curso?')) {
      this.cargando = id; // Mostrar spinner en el botón
      const url = window.rutas.toggleEstado.replace(':id', id);
      axios.get(url)
        .then(response => {
          const curso = this.cursos.find(c => c.id === id);
          if (curso) {
            curso.estado = curso.estado === 1 ? 0 : 1;
          }
          alert('El estado del curso ha sido actualizado con éxito.');
        })
        .catch(error => {
          console.error('Error al cambiar el estado del curso:', error);
          alert('No se pudo actualizar el estado del curso.');
        })
        .finally(() => {
          this.cargando = null; // Ocultar spinner
        });
    }
  },
  editCurso(id) {
      // Realizamos una solicitud PATCH con axios
      axios.patch(`/cursos/edit/${id}`, {
        // Aquí puedes enviar los datos que deseas actualizar, por ejemplo:
        // title: this.course.title,
        // description: this.course.description,
        // Si solo deseas redirigir, puedes hacerlo aquí sin necesidad de enviar datos:
      })
      .then(response => {
        // Redirige a la página de edición, si es necesario
        window.location.href = `Cursos/cursos/update/${id}`;
      })
      .catch(error => {
        console.error('Error al editar el curso:', error);
        alert('No se pudo editar el curso.');
      });
    }
}

};

</script>

 
  
  <style>
  /* stilos aquí */
  
  </style>
  