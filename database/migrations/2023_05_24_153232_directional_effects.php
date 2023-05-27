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
        Schema::create('directional_effects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('study_degree');
            $table->string('thematic_category');
            $table->string('directional_effect_code');
            $table->string('universal_effect_code');
            $table->string('second_universal_effect_code');
            $table->string('type_of_effect');
            $table->string('link_effect_to_discipline');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directional_effects');
    }

};
