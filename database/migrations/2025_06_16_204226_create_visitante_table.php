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
        Schema::create('visitante', function (Blueprint $table) {
            $table->id('idVisitante');
            $table->string('origenVisita', 25)->nullable();
            $table->unsignedBigInteger('idPersona');
            $table->timestamps();

            $table->foreign('idPersona')->references('idPersona')->on('personas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitante');
    }
};
