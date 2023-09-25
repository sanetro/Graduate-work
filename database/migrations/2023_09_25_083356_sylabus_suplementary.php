<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        
        Schema::create('sylabus_suplementary', function (Blueprint $table) {
            $table->increments('id');
            $table->text('other_way_of_teaching'); 
            $table->string('form_of_assessment', 100); 
            $table->float('participation_of_ects_for_number_of_hours_lecturer'); 
            $table->float('participation_of_ects_for_number_of_hours_online'); 
            $table->float('participation_of_ects_for_number_of_hours_own_work');
            $table->string('description_of_the_prequesities', 2000); 
            $table->string('language_of_lessons', 100); 
            $table->string('list_of_primary_literature_to_the_subject', 2000); 
            $table->string('list_of_suplementary_literature_to_the_subject', 2000); 
            $table->text('lecturers_competence_to_teach_the_subject');
            $table->unsignedBigInteger('directional_effects_id')->foreignId('directional_effects_id')->references('id')->on('directional_effects');
            $table->unsignedBigInteger('subject_effects_id')->foreignId('subject_effects_id')->references('id')->on('subject_effects');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sylabus_suplementary');
    }
};
