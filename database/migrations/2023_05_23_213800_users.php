<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->foreignId('role_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('surname');
            $table->string('titles');
            $table->unsignedBigInteger('chair_id')->foreignId('chair_id')->references('id')->on('chairs');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
