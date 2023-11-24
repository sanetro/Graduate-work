<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sylabus_to_subject_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('sylabus_id')->foreignId('sylabus_id')->references('id')->on('sylabus_initialized');
            $table->unsignedBigInteger('subject_contents_id')->foreignId('subject_contents_id')->references('id')->on('subject_contents');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sylabus_to_subject_contents');
    }
};
