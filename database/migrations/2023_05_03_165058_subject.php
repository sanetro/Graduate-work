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
        Schema::create('subject', function (Blueprint $table) {
            $table->increments('id_subject');
            $table->string('code', 100)->unique();
            $table->string('name_subject', 250);
            $table->string('coordinator', 255); 
            $table->string('teacher', 255); 
            $table->string('type_study', 50);
            $table->string('speciality', 100);
            $table->string('bachelor_degree', 5); 
            $table->string('semester', 50); 
            $table->string('department', 250); 
            $table->string('chair', 200); 
            $table->string('required', 50); 
            $table->double('lgo_p'); 
            $table->string('subject_status', 100); 
            $table->smallInteger('ects'); 
            $table->smallInteger('lgo'); 
            $table->smallInteger('lgw'); 
            $table->smallInteger('lgs'); 
            $table->smallInteger('lgc'); 
            $table->string('type_of_exercice', 50); 
            $table->text('pfpz'); 
            $table->string('f_zal', 100); 
            $table->float('e_lgwyk'); 
            $table->float('e_pw'); 
            $table->float('ects_sg'); 
            $table->float('ects_tl'); 
            $table->float('ects_ts'); 
            $table->float('lg_wyk'); 
            $table->float('lg_k'); 
            $table->float('lg_uwb'); 
            $table->float('lg_ops'); 
            $table->float('lg_uez'); 
            $table->float('lg_online'); 
            $table->float('lg_pw'); 
            $table->string('pr_st', 100); 
            $table->string('wy_wst', 2000); 
            $table->string('j_wyk', 100); 
            $table->string('sp_ww', 2000); 
            $table->string('sp_wc', 2000); 
            $table->string('sp_ws', 2000); 
            $table->string('lit_podst', 2000); 
            $table->string('lit_uzup', 2000); 
            $table->float('kdpp'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
