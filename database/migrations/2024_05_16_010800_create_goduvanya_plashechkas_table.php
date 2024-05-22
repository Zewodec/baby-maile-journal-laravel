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
        Schema::create('goduvanya_plashechkas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('datetime');
            $table->string('plashechka_type');
            $table->integer('plashechka_amount');
            $table->time('plashechka_time');
            $table->string('goduvanya_type');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('child_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goduvanya_plashechkas');
    }
};
