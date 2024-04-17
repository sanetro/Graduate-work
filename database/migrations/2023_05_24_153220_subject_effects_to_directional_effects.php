<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subject_effects_to_directional_effects', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_effects_id')->foreignId('subject_effects_id')->references('id')->on('subject_effects');
            $table->unsignedBigInteger('directional_effects_id')->foreignId('directional_effects_id')->references('id')->on('directional_effects');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('subject_effects_to_directional_effects');
    }

};
