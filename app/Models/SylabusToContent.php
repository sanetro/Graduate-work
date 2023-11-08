<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SylabusToContent extends Model
{
    use HasFactory;

    protected $table = "sylabus_to_subject_contents";
    
    protected $fillable = [
        'sylabus_id',
        'content_id'
    ];

    public function contents() : BelongsTo
    {
        return $this->belongsTo(User::class, 'content_id', 'id');    
    }

    public function sylabuses() : BelongsTo
    {
        return $this->belongsTo(Sylabus_initialized::class, 'sylabus_id', 'id');    
    }
}
