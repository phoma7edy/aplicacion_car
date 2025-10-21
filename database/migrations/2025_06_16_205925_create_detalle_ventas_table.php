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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('idDetalleV');
            $table->unsignedBigInteger('idVenta');
            $table->unsignedBigInteger('idProducto');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('idVenta')->references('idVenta')->on('ventas')->onDelete('cascade');
            $table->foreign('idProducto')->references('idProducto')->on('vehiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
