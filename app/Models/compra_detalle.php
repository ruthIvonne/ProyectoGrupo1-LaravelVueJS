<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class compra_detalle extends Model
{
    //
    protected $table = 'compra_detalle';
    protected $fillable = [
        'id_compra_superior',
        'id_compra_curso',
        'total',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
