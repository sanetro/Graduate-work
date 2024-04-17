<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectContent extends Model
{
    use HasFactory;

    protected $table = "subject_contents";

    public $timestamps = false;

    protected $hidden = [
        'id',
    ];
    
    protected $fillable = [
        'type_of_content',
        'content_description',
        'tags',
        'difficulty_level',
        'method_of_veryfication_for_evaluation',
    ];
}
