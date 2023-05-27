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
        Schema::create('teacher_to_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('subject_id')->foreignId('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('teacher_id')->foreignId('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_to_subject');
    }
};
