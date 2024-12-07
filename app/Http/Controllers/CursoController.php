<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\User;
use App\Http\Requests\CursoFormRequest;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $docentes = User::where('rol', 'docente')->get();

        return view('cursos.create', compact('categorias', 'docentes'));
    }

    public function store(CursoFormRequest $request)
    {
        // Crear el curso con los datos validados
        $curso = new Curso();
        $curso->titulo = $request->input('titulo');
        $curso->institucion = $request->input('institucion');
        $curso->plan_de_estudio = $request->input('plan_de_estudio');
        $curso->duracion = $request->input('duracion'); // Almacenar directamente en formato HH:MM:SS
        $curso->certificados = $request->input('certificados');
        $curso->precio = $request->input('precio');
        $curso->video_url = $request->input('video_url');
        $curso->categoria_id = $request->input('categoria_id');
        $curso->docente_id = $request->input('docente_id');
        $curso->save();

        // Redirigir o devolver una respuesta
        return redirect()->route('cursos.index');
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $categorias = Categoria::all();
        $docentes = User::where('rol', 'docente')->get();

        return view('cursos.edit', compact('curso', 'categorias', 'docentes'));
    }

    public function update(CursoFormRequest $request, $id)
    {
        $curso = Curso::findOrFail($id);

        // Actualizar los campos del curso con los datos validados
        $curso->titulo = $request->input('titulo');
        $curso->institucion = $request->input('institucion');
        $curso->plan_de_estudio = $request->input('plan_de_estudio');
        $curso->duracion = $request->input('duracion');  // Almacenar directamente en formato HH:MM:SS
        $curso->certificados = $request->input('certificados');
        $curso->precio = $request->input('precio');
        $curso->video_url = $request->input('video_url');
        $curso->categoria_id = $request->input('categoria_id');
        $curso->docente_id = $request->input('docente_id');
        $curso->save();

        // Redirigir o devolver una respuesta
        return redirect()->route('cursos.index');
    }
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente');
    }
}
