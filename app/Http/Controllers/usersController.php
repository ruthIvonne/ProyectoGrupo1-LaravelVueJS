<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsuarioFormRequest;
Use Exception;


class usersController extends Controller
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
    public function create()
    {
        return view('users.crearUsuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioFormRequest $request)
    {
        try{
            DB::beginTransaction();
            $userValidacion = User::create([
                'name'  =>  $request->name,
            ]);
            if($userValidacion){
                DB::commit();
                return redirect('/'); 
            };
        } catch (\Exception $e) {
            DB::rollBack();
        };
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
}
