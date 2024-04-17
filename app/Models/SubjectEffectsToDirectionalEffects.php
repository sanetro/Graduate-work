<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectEffectsToDirectionalEffects extends Model
{
    use HasFactory;

    protected $table = "subject_effects_to_directional_effects";
    public $timestamps = false;
    
    
    protected $fillable = [
        'directional_effects_id',
        'subject_effects_id'
    ];

    public function effects() : BelongsTo
    {
        return $this->belongsTo(SubjectContents::class, 'subject_effects_id', 'id');    
    }

    public function directional() : BelongsTo
    {
        return $this->belongsTo(DirectionalEffects::class, 'directional_effects_id', 'id');    
    }
}
