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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('parent_1_image')->default('parent_images/parent-avatar.png');
            $table->string('parent_1_first_name')->nullable();
            $table->string('parent_1_last_name')->nullable();
            $table->string('parent_2_image')->default('parent_images/parent-avatar.png');
            $table->string('parent_2_first_name')->nullable();
            $table->string('parent_2_last_name')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
