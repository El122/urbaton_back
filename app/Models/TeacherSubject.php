<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'subject_id',

        'plan',
        'year',
    ];
}
