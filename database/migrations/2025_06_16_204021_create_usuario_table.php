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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('nomUsuario', 50)->unique();
            $table->string('password');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->date('fechaNacimiento')->nullable();
            $table->unsignedBigInteger('idPersona');
            $table->unsignedBigInteger('idRol');
            $table->timestamps();

            
            $table->foreign('idPersona')->references('idPersona')->on('personas')->onDelete('cascade');
            $table->foreign('idRol')->references('idRol')->on('rol')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
