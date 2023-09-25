<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function getInnerId()
    {
        return $this->hasOne('sylabus_suplementary', 'id');
    }
}
