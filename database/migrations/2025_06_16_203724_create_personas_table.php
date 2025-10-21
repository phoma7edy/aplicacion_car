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
        Schema::create('personas', function (Blueprint $table) {
            $table->id('idPersona');
            $table->string('nombre', 25)->nullable();
            $table->string('paterno', 25)->nullable();
            $table->string('materno', 25)->nullable();
            $table->string('ci', 20)->unique();
            $table->enum('genero', ['M', 'F']);
            $table->string('correo', 100)->nullable();
            $table->integer('telefono')->nullable();
            $table->date('fechaRegistro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
