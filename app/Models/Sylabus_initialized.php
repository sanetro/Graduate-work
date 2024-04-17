<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Sylabus_initialized extends Model
{
    use HasFactory;
    
    protected $table = "sylabus_initialized";

    protected $hidden = [
        'id',
    ];

    
    protected $fillable = [
        'code_subject',
        'name_subject',
        'type_study',
        'speciality',
        'degree',
        'semester',
        'chair_id',
        'required',
        'calculator_for_subjects_to_order',
        'status_subject',
        'ects_summary',
        'total_number_of_hours',
        'lectures_number_of_hours',
        'seminars_number_of_hours',
        'exercise_number_of_hours',
        'type_of_exercice',
        'direction_name',
        'subject_content_id',
        'number_of_hours_with_lecturer',
        'number_of_hours_of_consultation',
        'number_of_hours_participation_in_research',
        'number_of_hours_mandatory_practices_and_internships',
        'number_of_hours_participations_in_the_exam_and_credits',
        'number_of_hours_online_classes',
        'number_of_hours_own_work',
        'study_profile',
    ];

    public function chair(): BelongsTo
    {
        return $this->belongsTo(Chair::class, 'chair_id', 'id');
    }

    public function subjectContent(): BelongsTo
    {
        return $this->belongsTo(SubjectContent::class, 'subject_content_id', 'id');
    }

    

    
}
