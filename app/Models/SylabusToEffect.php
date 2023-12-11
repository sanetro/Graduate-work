<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SylabusToEffect extends Model
{
    use HasFactory;

    protected $table = "sylabus_supl_to_subject_effects";
    public $timestamps = false;
    
    
    protected $fillable = [
        'sylabus_id',
        'subject_effects_id'
    ];

    public function effects() : BelongsTo
    {
        return $this->belongsTo(SubjectContents::class, 'subject_effects_id', 'id');    
    }

    public function sylabuses() : BelongsTo
    {
        return $this->belongsTo(Sylabus_initialized::class, 'sylabus_id', 'id');    
    }
}
