<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model {
    use HasFactory;

    protected $fillable = [
        'date',
        'index',
        'classwork',
        'homework',

        'teacher_subject_id',
        'group_id',
    ];
}
