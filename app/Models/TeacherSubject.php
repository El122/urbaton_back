<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeacherSubject extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'subject_id',

        'plan',
        'year',
    ];

    public function subject(): BelongsTo {
        return $this->belongsTo(Subject::class);
    }

    public function teacher(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function withData() {
        $this->subject;
        $this->teacher;
        return $this;
    }
}
