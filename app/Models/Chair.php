<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Chair extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'department_id'
    ];

    public function departments() : BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');    
    }
}
