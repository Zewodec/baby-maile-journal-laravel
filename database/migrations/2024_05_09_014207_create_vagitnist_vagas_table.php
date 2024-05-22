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
        Schema::create('vagitnist_vagas', function (Blueprint $table) {
            $table->id();
            $table->double('vaga');
            $table->dateTime('date');
            $table->integer('week');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('children_id')->constrained('children')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagitnist_vagas');
    }
};
