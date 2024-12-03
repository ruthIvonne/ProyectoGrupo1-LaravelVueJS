<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progreso extends Model
{
    //
    protected $table = 'progresos';
    protected $fillable = [
        'id_alumno',
        'id_curso',
        'completo',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
