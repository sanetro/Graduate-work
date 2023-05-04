<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_suject',
        'code',
        'name_subject',
        'coordinator',
        'teacher',
        'type_study',
        'speciality',
        'bachelor degree',
        'semester',
        'department',
        'chair',
        'required',
        'lgo_p',
        'subject_status',
        'ects',
        'lgo',
        'lgw',
        'lgs',
        'lgc',
        'type_of_exercice',
        'pfpz',
        'f_zal',
        'e_lgwyk',
        'ects_sg',
        'ects_tl',
        'ects_ts',
        'lg_wyk',
        'lg_k',
        'lg_uwb',
        'lg_ops',
        'lg_uez',
        'lg_online',
        'lg_pw',
        'pr_st',
        'wy_wst',
        'j_wyk',
        'sp_ww',
        'sp_wc',
        'sp_ws',
        'lit_podst',
        'lit_uzup',
        'kdpp'
    ];
}
