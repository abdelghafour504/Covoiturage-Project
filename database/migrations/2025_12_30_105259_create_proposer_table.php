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
        Schema::create('proposer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trajects_id')->nullable()->constrained('trajects');
            $table->foreignId('drivers_id')->nullable()->constrained('drivers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposer');
    }
};
