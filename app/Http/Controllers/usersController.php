<?php
namespace App\Http\Controllers;

    use App\Models\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\DB;
    use App\Http\Requests\UsuarioFormRequest;
    use Illuminate\Support\Facades\Hash;
    Use Exception;


    class UsersController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            //
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
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UsuarioFormRequest $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }

        public function create()
        {
          return view('users.crearUsuario');
        }
    }
