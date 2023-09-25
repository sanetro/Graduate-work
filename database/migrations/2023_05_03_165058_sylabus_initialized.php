<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sylabus_initialized', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_subject', 100)->unique();
            $table->string('name_subject', 250);
            $table->string('type_study', 50);
            $table->string('speciality', 100);
            $table->string('degree', 5); 
            $table->string('semester', 50); 
            $table->unsignedBigInteger('chair_id')->foreignId('chair_id')->references('id')->on('chairs'); 
            $table->string('required', 50); 
            $table->double('calculator_for_subjects_to_order'); 
            $table->string('status_subject', 100); 
            $table->smallInteger('ects_summary'); 
            $table->smallInteger('total_number_of_hours');   
            $table->smallInteger('lectures_number_of_hours'); 
            $table->smallInteger('seminars_number_of_hours'); 
            $table->smallInteger('exercise_number_of_hours'); 
            $table->string('type_of_exercice', 50); 
            $table->string('direction_name', 100);
            $table->unsignedBigInteger('subject_content_id')->foreignId('subject_content_id')->references('id')->on('subject_contents'); 
            $table->float('number_of_hours_with_lecturer'); 
            $table->float('number_of_hours_of_consultation'); 
            $table->float('number_of_hours_participation_in_research'); 
            $table->float('number_of_hours_mandatory_practices_and_internships'); 
            $table->float('number_of_hours_participations_in_the_exam_and_credits'); 
            $table->float('number_of_hours_online_classes'); 
            $table->float('number_of_hours_own_work'); 
            $table->string('study_profile', 100); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sylabus_initialized');
    }
};
