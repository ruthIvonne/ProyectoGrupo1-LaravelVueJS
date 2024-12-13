<?php
namespace App\Http\Controllers;

    use App\Models\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\DB;
    use App\Http\Requests\UsuarioFormRequest;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Storage;

    Use Exception;



    class usersController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index(Request $request)
        {
            $search = $request->input('search');
            $users = User::query()
                ->when($search, function ($query, $search) {
                    return $query->where('name', 'like', "%$search%")
                                 ->orWhere('email', 'like', "%$search%");
                })
                ->paginate(10); // Paginación funcionando
    
            return view('users.listarUsuarios', compact('users'));
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('users.crearUsuario');
        }
        /**
         * Show the form for creating a new resource.
         */
        public function store(UsuarioFormRequest $request)
    {
        try {
            DB::beginTransaction();

            // Validación de los datos recibidos
            $data = $request->validated();

            // Crea un nuevo usuario
            $user = User::create([
                'name' => $data['name'],
                'apellido' => $data['apellido'],
                'email' => $data['email'],
                'password' => ($data['password']), // Asegúrate de que la contraseña esté cifrada
                'biografia' => $data['biografia'],
                'rol' => $data['rol'] ?? 'alumno', // Asignación de rol por defecto
                'foto_perfil' => $data['foto_perfil'] ?? null, // Foto de perfil opcional
            ]);

            // Si la creación del usuario fue exitosa, confirmamos la transacción
            if ($user) {
                DB::commit();
                return redirect('/')->with('success', 'Usuario creado con éxito');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Hubo un error al crear el usuario: ' . $e->getMessage());
        }
    }
        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $user = User::findOrFail($id);
            return view('users.show', compact('user'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $user = User::findOrFail($id);
            return view('users.editarUsuario', compact('user'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, $id)
        {
            // Validación de los campos
            $request->validate([
                'name' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'biografia' => 'nullable|string',
                'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la foto
                'rol' => 'required|in:alumno,docente,administrador', // Asegurarse de que el rol sea válido
            ]);

            $user = User::findOrFail($id);

            // Solo actualiza los campos que han cambiado
            if ($request->has('name')) {
                $user->name = $request->input('name');
            }

            if ($request->has('apellido')) {
                $user->apellido = $request->input('apellido');
            }

            if ($request->has('email')) {
                $user->email = $request->input('email');
            }

            if ($request->has('biografia')) {
                $user->biografia = $request->input('biografia');
            }

            if ($request->has('rol')) {
                $user->rol = $request->input('rol');
            }

            // Si se sube una nueva foto de perfil
            if ($request->hasFile('foto_perfil')) {
                // Eliminar la foto anterior si existe
                if ($user->foto_perfil) {
                    Storage::delete('public/profile_pictures/' . $user->foto_perfil);
                }

                // Guardar la nueva foto de perfil
                $path = $request->file('foto_perfil')->store('public/profile_pictures');
                $user->foto_perfil = basename($path);
            }

            // Si el campo de la contraseña se incluye y no está vacío, actualiza la contraseña
            if ($request->has('password') && $request->input('password') !== '') {
                $user->password = Hash::make($request->input('password'));
            }

            // Guardar los cambios
            $user->save();

            // Redirigir con un mensaje de éxito
            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
        }
    
        public function search(Request $request)
        {
            $query = User::query();

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('apellido', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('rol', 'like', "%{$search}%");
            }

            $users = $query->get();

            return view('users.search', compact('users'));
        }


        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $user = User::findOrFail($id);
            $user->delete();
    
            return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
        }

 
    }