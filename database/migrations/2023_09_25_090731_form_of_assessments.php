<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_of_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('form_of_assessments');
        
    }
};
