<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subject_effects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol');
            $table->unsignedBigInteger('category_effects_id')->foreignId('category_effects_id')->references('id')->on('category_effects');
            $table->string('description');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('subject_effects');
    }
};
