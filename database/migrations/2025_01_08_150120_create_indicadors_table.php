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
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('minimo')->default(0)->comment('Es el limite inferior');
            $table->integer('aceptable')->default(0)->comment('Es la meta a alcanzar');
            $table->integer('excelente')->default(0)->comment('Es el limite sactisfactorio');
            $table->unsignedBigInteger('id_catalogo_proceso');
            $table->unsignedBigInteger('id_catalogo_tendencia');
            $table->unsignedBigInteger('id_catalogo_planta');
            $table->foreign('id_catalogo_proceso')->references('id')->on('catalogo_procesos');
            $table->foreign('id_catalogo_tendencia')->references('id')->on('catalogo_tendencias');
            $table->foreign('id_catalogo_planta')->references('id')->on('catalogo_plantas');
            $table->boolean('activo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicadors');
    }
};
