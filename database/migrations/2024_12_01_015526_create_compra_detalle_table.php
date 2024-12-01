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
        Schema::create('compra_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_compra_superior');
            $table->foreign('id_compra_superior')->references('id')->on('compra_vista_superior');
            $table->unsignedBigInteger('id_compra_curso');
            $table->foreign('id_compra_curso')->references('id')->on('cursos');
            $table->decimal('total',30,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_detalle');
    }
};
