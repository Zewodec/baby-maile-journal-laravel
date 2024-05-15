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
        Schema::create('progulyankas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('time');
            $table->date('date');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('child_id')->constrained('children');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progulyankas');
    }
};
