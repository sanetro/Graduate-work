<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->unsignedBigInteger('department_id')->foreignId('department_id')->references('id')->on('departments');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chairs');
    }
};
