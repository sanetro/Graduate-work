<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionalEffect extends Model
{
    use HasFactory;

    protected $table = "directional_effects";

    public $timestamps = false;

    protected $hidden = [
        'id',
    ];
    
    protected $fillable = [
        'id',
        'direction_name',
        'study_degree',
        'thematic_category',
        'directional_effect_code',
        'universal_effect_code',
        'second_universal_effect_code',
        'type_of_effect',
        'link_effect_to_discipline',
    ];

    public function sylabuses()
    {
        return $this->belongsToMany(Sylabus_initialized::class, 'sylabus_to_effect', 'directional_effects_id', 'sylabus_id');
    }

    
}
