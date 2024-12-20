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

    public function compraSuperior()
        {
            return $this->belongsTo(compra_vista_superior::class, 'id_compra_superior');
        }
        public function compra()
        {
            return $this->belongsTo(Compra_vista_superior::class, 'id_compra_superior');
        }

        public function curso()
        {
            return $this->belongsTo(Curso::class, 'id_compra_curso');
        }
       
    
      



}
