<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resenia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alumno_resenia');
            $table->foreign('id_alumno_resenia')->references('id')->on('users');
            $table->unsignedBigInteger('id_curso_resenia');
            $table->foreign('id_curso_resenia')->references('id')->on('cursos');
            $table->integer('calificacion');
            $table->string('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resenia');
    }
};
