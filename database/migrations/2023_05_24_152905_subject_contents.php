<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subject_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_of_content', 100); 
            $table->string('content_description', 2000); 
            $table->string('tags', 50);
            $table->string('difficulty_level', 50); 
            $table->string('method_of_veryfication_for_evaluation_of_lecturer', 2000); 
            $table->string('method_of_veryfication_for_evaluation_of_exercise', 2000); 
            $table->string('method_of_veryfication_for_evaluation_of_seminars', 2000);
            
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('subject_contents');
    }
};
