<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * "datetime" => "2024-05-16T04:19"
     * "group1" => "Молочні продукти"
     * "group2" => "Злаки"
     * "group3" => "Інше"
     * "goduvanya_type" => "tverda"
     * "tverda_time" => "1.331"
     */
    public function up(): void
    {
        Schema::create('goduvanya_tverdas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('child_id')->constrained()->cascadeOnDelete();
            $table->dateTime('datetime');
            $table->string('group1');
            $table->string('group2');
            $table->string('group3');
            $table->string('goduvanya_type');
            $table->time('tverda_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goduvanya_tverdas');
    }
};
