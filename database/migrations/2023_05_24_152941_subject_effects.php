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
        Schema::create('subject_effects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('subject_id')->foreignId('subject_id')->references('id')->on('subject_effects_to_directional_effects');
            $table->string('symbol');
            $table->string('category');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_effects');
    }
};
