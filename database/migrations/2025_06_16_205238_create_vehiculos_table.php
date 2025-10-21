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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('nombre', 25);
            $table->string('modelo', 25);
            $table->string('marca', 25);
            $table->text('imagen_url')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('placa', 20)->nullable();
            $table->string('color', 30)->nullable();
            $table->enum('estado', ['disponible', 'vendido', 'reparacion'])->default('disponible');
            $table->string('nomCategoria', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
