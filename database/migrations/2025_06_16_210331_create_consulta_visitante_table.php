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
        Schema::create('consulta_visitante', function (Blueprint $table) {
            $table->id('idConsultaV');
            $table->unsignedBigInteger('idVisitante');
            $table->unsignedBigInteger('idProducto');
            $table->date('fechaConsulta');
            $table->timestamps();

            $table->foreign('idVisitante')->references('idVisitante')->on('visitante')->onDelete('cascade');
            $table->foreign('idProducto')->references('idProducto')->on('vehiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_visitante');
    }
};
