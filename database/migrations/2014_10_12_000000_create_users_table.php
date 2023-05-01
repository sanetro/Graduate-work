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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            /* For 'role'
                0 - user (read-only)
                1 - user.department (read-modify-restricted)
                2 - user.council (read-modify-unrestricted)
            */
            $table->tinyInteger('role'); 
            /* For 'department'
                0 - department named "0"
                1 - department named "1"
                2 - department named "2"
            */
            $table->tinyInteger('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
