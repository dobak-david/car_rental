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
        Schema::create('Reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('berles_kezdete');
            $table->dateTime('berles_vege');
            $table->string('berlo_neve');
            $table->string('berlo_email');
            $table->string('berlo_cim');
            $table->integer('berlo_telefon');
            $table->foreignId('auto_id')->constrained('cars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Reservations');
    }
};
