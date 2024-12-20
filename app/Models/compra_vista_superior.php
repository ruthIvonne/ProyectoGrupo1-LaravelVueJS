<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class compra_vista_superior extends Model
{
    //
    protected $table = 'compra_vista_superior';
    protected $fillable = [
        'id_alumno_compra',
        'cantidad',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function detalles()
        {
            return $this->hasMany(compra_detalle::class, 'id_compra_superior');
        }
        public function usuario()
        {
            return $this->belongsTo(User::class, 'id_alumno_compra');
        }
       



}
