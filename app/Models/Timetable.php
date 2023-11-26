<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function teacherSubject(): BelongsTo {
        return $this->belongsTo(TeacherSubject::class);
    }
}
