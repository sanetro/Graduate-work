<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryEffect extends Model
{
    use HasFactory;

    protected $table = "category_effects";
    public $timestamps = false;
    
    
    protected $fillable = [
        'name',
    ];

    

}
