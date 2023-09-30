<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserToSylabus extends Model
{
    use HasFactory;

    protected $table = "user_to_sylabus";
    
    protected $fillable = [
        'user_id',
        'sylabus_id'
    ];

    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');    
    }

    public function sylabuses() : BelongsTo
    {
        return $this->belongsTo(Sylabus_initialized::class, 'sylabus_id', 'id');    
    }
}
