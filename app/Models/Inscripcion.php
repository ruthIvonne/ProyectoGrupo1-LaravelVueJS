<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
    //
}
public function user() {
    return $this->belongsTo(User::class);
}
public function curso() {
    return $this->belongsTo(Curso::class);
}