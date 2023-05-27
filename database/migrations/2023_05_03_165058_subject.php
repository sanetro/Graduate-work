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
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('chair_id')->foreignId('chair_id')->references('id')->on('chairs');
            $table->unsignedBigInteger('teacher_id')->foreignId('teacher_id')->references('id')->on('teachers');
            $table->string('code_subject', 100)->unique();
            $table->string('name_subject', 250);
            $table->string('type_study', 50);
            $table->string('speciality', 100);
            $table->string('degree', 5); 
            $table->string('semester', 50); 
            $table->string('department', 250); 
            $table->string('required', 50); 
            $table->double('calculator_for_subjects_to_order'); 
            $table->string('subject_status', 100); 
            $table->smallInteger('ects_summary'); 
            $table->smallInteger('total_number_of_hours');   
            $table->smallInteger('lectures_number_of_hours'); 
            $table->smallInteger('seminars_number_of_hours'); 
            $table->smallInteger('exercise_number_of_hours'); 
            $table->string('type_of_exercice', 50); 
            $table->text('other_way_of_teaching'); 
            $table->string('form_of_assessment', 100); 
            $table->float('participation_of_ects_for_number_of_hours_lecturer'); 
            $table->float('participation_of_ects_for_number_of_hours_online'); 
            $table->float('participation_of_ects_for_number_of_hours_own_work'); 
            $table->float('number_of_hours_with_lecturer'); 
            $table->float('number_of_hours_of_consultation'); 
            $table->float('number_of_hours_participation_in_research'); 
            $table->float('number_of_hours_mandatory_practices_and_internships'); 
            $table->float('number_of_hours_participations_in_the_exam_and_credits'); 
            $table->float('number_of_hours_online_classes'); 
            $table->float('number_of_hours_own_work'); 
            $table->string('study_profile', 100); 
            $table->string('description_of_the_prequesities', 2000); 
            $table->string('language_of_lessons', 100); 
            $table->string('method_of_veryfication_for_lecturer', 2000); 
            $table->string('method_of_veryfication_for_exercise', 2000); 
            $table->string('method_of_veryfication_for_seminars', 2000); 
            $table->string('list_of_primary_literature_to_the_subject', 2000); 
            $table->string('list_of_suplementary_literature_to_the_subject', 2000); 
            $table->text('lecturers_competence_to_teach_the_subject'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
