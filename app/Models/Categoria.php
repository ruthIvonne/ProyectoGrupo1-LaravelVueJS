<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categorias';
    protected $fillable = [
        'nombre_categoria',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
