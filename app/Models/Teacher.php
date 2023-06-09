<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'surname',
        'titles',
    ];

    protected $hidden = [
        'id',
    ];

    public function idetifyTeacher() : MorphTo
    {
        return $this->morphTo();
    }

}
