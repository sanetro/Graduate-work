<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectEffect extends Model
{
    use HasFactory;

    protected $table = "subject_effects";

    public $timestamps = false;

    protected $hidden = [
        'id',
    ];
    
    protected $fillable = [
        'symbol',
        'category_effects_id',
        'description'
    ];

    public function categories() : BelongsTo
    {
        return $this->belongsTo(CategoryEffect::class, 'category_effects_id', 'id');    
    }
}
