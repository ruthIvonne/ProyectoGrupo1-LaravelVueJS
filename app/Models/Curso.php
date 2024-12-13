<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'titulo',
        'institucion',
        'plan_de_estudio',
        'duracion',
        'certificados',
        'precio',
        'video_url',
        'estado', 
        'categoria_id', // Relación con categorías
        'user_created',
        'user_updated',
        'categoria_id',
        'docente_id',
    ];

    // Relación con el usuario creador
    public function creador()
    {
        return $this->belongsTo(User::class, 'user_created');
    }

    // Relación con el usuario actualizador
    public function actualizador()
    {
        return $this->belongsTo(User::class, 'user_updated');
    }

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con el docente
    public function docente()
    {
        return $this->belongsTo(User::class, 'docente_id');
    }

    // Relación con los alumnos
    public function alumnos()
    {
        return $this->belongsToMany(User::class, 'curso_user', 'curso_id', 'user_id')
->withTimestamps();
    }

    
}
