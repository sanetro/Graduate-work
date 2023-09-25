<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sylabus_supl_to_subject_effects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('sylabus_id')->foreignId('sylabus_id')->references('id')->on('sylabus_suplementary');
            $table->unsignedBigInteger('subject_effects_id')->foreignId('subject_effects_id')->references('id')->on('subject_effects');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sylabus_supl_to_subject_effects');
    }
};
