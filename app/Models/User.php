<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    const ROL_DOCENTE = 'docente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'email',
        'password', // Asegúrate de incluir 'password' aquí
        'rol',
        'foto_perfil',
        'biografia',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Oculta la contraseña al serializar el modelo
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator to hash the password before saving.
     *
     * @param string $password
     * @return void
     */

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    //  // Método para verificar si es docente
    //  public function isDocente()
    //  {
    //      return $this->rol === self::ROL_DOCENTE;
    //  }

    //  public function isAdmin() {
    //     return $this->role === 'admin'; // Cambia 'admin' al rol que uses
    // }

    // public function isUser() {
    //     return $this->role === 'user'; // Cambia 'user' al rol que uses
    // }
}
