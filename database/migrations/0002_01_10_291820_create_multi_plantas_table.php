<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('multi_plantas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_planta');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_planta')
                ->references('id')->on('catalogo_plantas');
            $table->foreign('id_usuario')
                ->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('multi_plantas');
    }
};
