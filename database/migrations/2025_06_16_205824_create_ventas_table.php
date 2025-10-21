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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('idVenta');
            $table->string('codigo', 50);
            $table->unsignedBigInteger('idUsuario');
            $table->decimal('costoVenta', 10, 2);
            $table->date('fechaVenta');
            $table->unsignedBigInteger('idMetPago');
            $table->timestamps();

            $table->foreign('idUsuario')->references('idUsuario')->on('usuario')->onDelete('cascade');
            $table->foreign('idMetPago')->references('idMetPago')->on('metodo_pagos')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
