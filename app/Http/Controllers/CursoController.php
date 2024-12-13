<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\User;
use App\Http\Requests\CursoFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CursoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $curso = new Curso();
        $curso->titulo = $request->input('titulo');
        $curso->institucion = $request->input('institucion');
        $curso->plan_de_estudio = $request->input('plan_de_estudio');
        $curso->duracion = $request->input('duracion'); // Almacenar en formato HH:MM:SS
        $curso->certificados = $request->boolean('certificados'); // Capturar como booleano
        $curso->precio = $request->input('precio');
        $curso->video_url = $request->input('video_url');
        $curso->categoria_id = $request->input('categoria_id');
        $curso->docente_id = $request->input('docente_id');
        $curso->user_created = null;
        $curso->user_updated = null;
        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito.');
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
        $curso->titulo = $request->input('titulo');
        $curso->institucion = $request->input('institucion');
        $curso->plan_de_estudio = $request->input('plan_de_estudio');
        $curso->duracion = $request->input('duracion');
        $curso->certificados = $request->boolean('certificados');
        $curso->precio = $request->input('precio');
        $curso->video_url = $request->input('video_url');
        $curso->categoria_id = $request->input('categoria_id');
        $curso->docente_id = $request->input('docente_id');
    //    $curso->user_updated = auth()->id() ?? null;
        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito.');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }

    public function menuDocente()
    {
        $cursos = Curso::all(); 
        return view('layouts.menuDocente', compact('cursos'));
    }

    public function asignados(CursoFormRequest $request)
    {
        // $user = Auth::user(); 
        // if (!$user) {
        //     return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus cursos asignados.');
        // }

        // Verificar el rol del usuario y filtrar cursos asignados
        // if ($user->rol === 'docente') {
        //     $cursos = Curso::where('docente_id', $user->id)->get();
        // } elseif ($user->rol === 'alumno') {
        //     $cursos = $user->cursosInscritos; // Relación entre usuarios y cursos
        // } else {
        //     return redirect()->route('cursos.index')->with('error', 'No tienes acceso a esta sección.');
        // }
        //return redirect()->route('cursos.index')->with('success', 'No tienes acceso a esta sección.');
        return view('docentes.cursos_asignados', compact('cursos'));
    }

    public function menuAlumno()
    {
        $cursos = Curso::all(); 
        return view('layouts.menuAlumno', compact('cursos'));
    }
    public function comprados()
    {
        // Verifica si el curso existe
       // $curso = Curso::findOrFail($id);;

        // Verificar si el alumno ya compró el curso
        // if (Auth::user()->cursosComprados->contains($curso)) {
        //     return redirect()->back()->with('error', 'Ya compraste este curso.');
        // }

        // Agregar el curso a los cursos comprados del alumno
       // Auth::user()->cursosComprados()->attach($curso);

       $cursos = Curso::all(); // O filtra los cursos según sea necesario.
       return view('alumnos.cursos_comprados', compact('cursos'));


       // return redirect()->route('alumnos.cursos_comprados')->with('success', 'Curso comprado exitosamente.');
    }

}
