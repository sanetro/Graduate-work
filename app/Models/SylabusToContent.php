<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SylabusToContent extends Model
{
    use HasFactory;

    protected $table = "sylabus_to_subject_contents";
    public $timestamps = false;
    
    
    protected $fillable = [
        'sylabus_id',
        'subject_contents_id'
    ];

    public function contents() : BelongsTo
    {
        return $this->belongsTo(SubjectContents::class, 'subject_contents_id', 'id');    
    }

    public function sylabuses() : BelongsTo
    {
        return $this->belongsTo(Sylabus_initialized::class, 'sylabus_id', 'id');    
    }
}
