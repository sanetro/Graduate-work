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
        Schema::create('subject_effects_to_directional_effects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('subject_effect_id')->foreignId('subject_effect_id')->references('id')->on('subject_effects');
            $table->unsignedBigInteger('directional_effect_id')->foreignId('directional_effect_id')->references('id')->on('directional_effects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_effects_to_directional_effects');
    }

};
