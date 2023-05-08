<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if(!Schema::hasTable('teacher_to_subject')){
        
            Schema::create('teachers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('surname');
                $table->string('titles'); 
                $table->string('chair'); 
                $table->string('department');
                $table->string('university');
                // $table->timestamps('date');  future
            });
        }

        if(!Schema::hasTable('teacher_to_subject')){
        
            Schema::create('teacher_to_subject', function (Blueprint $table) {
                $table->unsignedInteger('id_teacher');
                $table->unsignedInteger('id_subject');
                $table->tinyInteger('subject_coordinator'); 
                $table->foreign('id_teacher')
                    ->references('id')
                    ->on('teachers')
                    ->onDelete('cascade');
                $table->foreign('id_subject')
                    ->references('id')
                    ->on('subject')
                    ->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('teachers'))
            Schema::dropIfExists('teachers');

        if(Schema::hasTable('teacher_to_subject'))
            Schema::dropIfExists('teacher_to_subject');
    }
};
