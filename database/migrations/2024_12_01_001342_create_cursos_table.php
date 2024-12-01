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
            $table->id();
            $table->string('titulo',100);
            $table->string('institucion',200);
            $table->string('plan_de_estudio',200);
            $table->time('duracion');
            $table->boolean('certificados');
            $table->decimal('precio',15,2);
            $table->string('video_url', 255)->nullable();
            $table->unsignedBigInteger('user_created');
            $table->foreign('user_created')->references('id')->on('users');
            $table->unsignedBigInteger('user_updated');
            $table->foreign('user_updated')->references('id')->on('users');
            $table->timestamps();
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
