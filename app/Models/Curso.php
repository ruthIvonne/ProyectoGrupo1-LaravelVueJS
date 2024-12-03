<?php

namespace App\Models;

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
        'user_created',
        'user_updated',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
