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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // Clave primaria estándar
            $table->string('titulo',100);
            $table->string('institucion',200);
            $table->string('plan_de_estudio',200);
            $table->time('duracion');
            $table->boolean('certificados');
            $table->decimal('precio',15,2);
            $table->string('video_url', 255)->nullable();
            $table->tinyInteger('estado')->default(1); // '1' para activo, '0' para inactivo
              // Clave foránea hacia 'categorias'
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')
            ->references('categoria_id') // Nombre de la columna de clave primaria en la tabla 'categorias'
            ->on('categorias'); //
             // Clave foránea hacia categorias
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('categoria_id')->on('categorias');

            $table->unsignedBigInteger('user_created')->nullable(); // Permite nulos en el campo
            $table->foreign('user_created')->references('id')->on('users');

            $table->unsignedBigInteger('user_updated')->nullable(); // Permite nulos en el campo
            $table->foreign('user_updated')->references('id')->on('users');
            //para definir usuarios en la creacion de productos
            //$table->unsignedBigInteger('user_created');
            //$table->foreign('user_created')->references('id')->on('users');
            //$table->unsignedBigInteger('user_updated');
            //$table->foreign('user_updated')->references('id')->on('users');
            //$table->timestamps();
        });
    }

     /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
