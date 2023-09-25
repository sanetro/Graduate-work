<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_to_sylabus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('sylabus_id')->foreignId('sylabus_id')->references('id')->on('sylabus_initialized');
            $table->unsignedBigInteger('user_id')->foreignId('user_id')->references('id')->on('users');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('user_to_sylabus');
    }
};
