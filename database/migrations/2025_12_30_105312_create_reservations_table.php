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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passengers_id')->nullable()->constrained('passengers');
            $table->foreignId('trajects_id')->nullable()->constrained('trajects')->onDelete('cascade');
            $table->integer('nb_places');
            $table->string('date_reservation');
            $table->enum('statut', ['Disponible', 'Complet'])->default('Disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
