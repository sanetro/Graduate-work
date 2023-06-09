<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'password'
    ];

    public function getTeacherInfo() : MorphMany
    {
        return $this->morphMany(Teacher::class, 'idetifyTeacher');    
    }

    public function getRoleInfo() : MorphMany
    {
        return $this->morphMany(Role::class, 'idetifyRole');    
    }

    public function belongSToTeacher() : BelongsTo 
    {
        return $this->belongsTo(Teacher::class);
    }
    
}
