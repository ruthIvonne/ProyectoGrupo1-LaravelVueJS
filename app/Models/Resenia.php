<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resenia extends Model
{
    Use HasFactory
    protected $table = 'resenia';
    //en este fillable se ponen los campos que serán accesibles al sistema
    protected $fillable = [
        'id_alumno_resenia',
        'id_curso_resenia',
        'calificacion',
        'comentario',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //Acá abajo van las relationship
}
