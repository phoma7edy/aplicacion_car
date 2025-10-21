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
        Schema::create('agregar', function (Blueprint $table) {
            $table->id('idAgrega');
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idProveedor');
            $table->integer('cantidad');
            $table->date('fechaAgregado');
            $table->decimal('costoCompra', 10, 2)->nullable();
            $table->decimal('subTotal', 10, 2)->nullable();
            $table->decimal('precioTotal', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('idUsuario')->references('idUsuario')->on('usuario')->onDelete('cascade');
            $table->foreign('idProducto')->references('idProducto')->on('vehiculos')->onDelete('cascade');
            $table->foreign('idProveedor')->references('idProveedor')->on('proveedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agregar');
    }
};
