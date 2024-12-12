<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    protected $table = 'cursos';
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
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'categoria_id');
    }
}
