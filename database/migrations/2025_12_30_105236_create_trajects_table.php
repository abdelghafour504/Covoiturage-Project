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
        Schema::create('trajects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drivers_id')->nullable()->constrained('drivers');
            $table->string('date_heure');
            $table->string('quartier_depart');
            $table->string('quartier_arrivee');
            $table->integer('nb_places_disponibles');
            $table->integer('prix');
            $table->text('commentaire')->nullable();
            $table->enum('statut', ['Disponible', 'Complet'])->default('Disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajects');
    }
};
