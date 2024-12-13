<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    use HasFactory;
     // Relación: una categoría tiene muchos cursos
     protected $primaryKey = 'categoria_id'; // Clave primaria personalizada

     public function cursos()
    {
        return $this->hasMany(Curso::class, 'categoria_id', 'categoria_id');
    }
     
}