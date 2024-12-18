<?php
namespace App\Http\Controllers;
use League\Csv\Reader;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Categoria;

class CourseController extends Controller{   
     public function index()
    {
        $cursos = Curso::paginate(10); // Obtener todos los cursos
        $cursos = Curso::with('categoria')->get(); // Carga la relación 'categoria'
        return view('Cursos.index', compact('cursos')); // Mostrar la vista con los cursos Crud
    }
    public function catalogo()
    {
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('Cursos.catalogo', compact('cursos')); // Mostrar la vista con los cursos al cliente
    }
  
    public function create()
    {
           // Recuperar todas las categorías de la base de datos
    $categorias = Categoria::all();

          // Pasar las categorías a la vista
    return view('Cursos.create', compact('categorias')); // Mostrar el formulario de creación
    }
    // Crear un nuevo curso
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'titulo' => 'required|string|max:100', // Limitar a 100 caracteres, como en la migración
                'institucion' => 'required|string|max:200', // Limitar a 200 caracteres
                'plan_de_estudio' => 'required|string|max:200', // Limitar a 200 caracteres, como en la migración
                'duracion' => 'required|string|max:255', // Ajuste para el tipo 'time', si usas HH:MM
                'certificados' => 'required|boolean', // Cambiar de string a boolean
                'precio' => 'required|numeric', // Validación correcta para un número
                'video_url' => 'nullable|url|max:255', 
                'categoria_id' => 'required',
              
            ]);
    
            $curso = Curso::create($validated);
            
    
            return response()->json([
                'message' => 'Curso creado con éxito',
                'curso' => $curso
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el curso: ' . $e->getMessage()
            ], 500);
        }
    }

    // Mostrar un curso específico
    public function show($id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            return response()->json(['message' => 'Curso no encontrado'], 404);
        }

        return view('Cursos.show', compact('curso')); // Renderiza la vista show
    }
    public function update_view($id)
    {
        $categorias = Categoria::all(); // Recuperar todas las categorías
        $curso = Curso::findOrFail($id); // Encuentra el curso o lanza un error 404
    
        return view('Cursos.update', compact('curso', 'categorias')); // Pasar datos a la vista
    }
    
    

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'plan_de_estudio' => 'required|string',
            'duracion' => 'required|string|max:100',
            'certificados' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'video_url' => 'nullable|url',
            'categoria_id' => 'required|exists:categorias,categoria_id',
        ]);
    
        // Encontrar el curso y actualizarlo
        $curso = Curso::findOrFail($id);
        $curso->update($validated);
    
        // Retornar una respuesta exitosa
        return response()->json(['message' => 'Curso actualizado con éxito'], 200);
    }
    


    // Eliminar fisicamente un curso
    public function destroy($id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            return response()->json(['message' => 'Curso no encontrado'], 404);
        }

        $curso->delete();
        return response()->json(['message' => 'Curso eliminado con éxito'], 200);
    }
    // Función para cambiar el estado de un curso
    public function toggleEstado($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->estado = $curso->estado === 1 ? 0 : 1;
        $curso->save();

        return response()->json(['message' => 'Estado actualizado con éxito.']);
    }
}

?>