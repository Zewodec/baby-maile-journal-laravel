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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('child_id')->constrained('children')->cascadeOnDelete();
            $table->date('start_last_menstruation')->nullable();
            $table->date('pology_date')->nullable();
            $table->date('alusherskiy_termin')->nullable();
            $table->date('data_zachatya')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
