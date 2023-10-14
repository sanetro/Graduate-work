<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sylabus_suplementary extends Model
{
    use HasFactory;

    protected $table = 'sylabus_suplementary'; // Nazwa tabeli w bazie danych, jeśli różni się od nazwy modelu
    public $timestamps = false;
    
    protected $hidden = [
        'id'
    ];
    
    protected $fillable = [
        'other_way_of_teaching',
        'form_of_assessment',
        'participation_of_ects_for_number_of_hours_lecturer',
        'participation_of_ects_for_number_of_hours_online',
        'participation_of_ects_for_number_of_hours_own_work',
        'description_of_the_prequesities',
        'language_of_lessons',
        'list_of_primary_literature_to_the_subject',
        'list_of_suplementary_literature_to_the_subject',
        'lecturers_competence_to_teach_the_subject',
        'directional_effects_id',
        'subject_effects_id',
    ];

    // Możesz dodać relacje lub inne metody modelu tutaj
}
