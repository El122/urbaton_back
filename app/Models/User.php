<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Student;
use App\Models\Teacher;
use Spatie\Permission\Traits\HasRoles;
use App\Enums\UserRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function fullName(): string {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }

    public function student(): HasOne {
        return $this->hasOne(Student::class);
    }

    public function teacher(): HasOne {
        return $this->hasOne(Teacher::class);
    }

    public function subjects(): BelongsToMany {
        return $this->belongsToMany(Subject::class, TeacherSubject::class)->withPivot('current', 'total', 'year');
    }

    public function groups(): HasMany {
        return $this->hasMany(Group::class);
    }

    public function withTeacherData(): static {
        $this->subjects;
        $this->teacher;
        $this->groups;
        return $this;
    }

    public function withStudentData(): static {
        $this->student;
        $this->student?->group;
        return $this;
    }

    public function withParentData(): static {
        foreach($this->children as $child) {
            $child->group;
            $child->user;
        }
        return $this;
    }

    public function children(): BelongsToMany {
        return $this->belongsToMany(Student::class, ParentStudent::class, 'parent_id', 'student_id');
    }

    public function isStudent():bool {
        return $this->hasRole(UserRoles::ROLE_STUDENT);
    }

    public function isTeacher():bool {
        return $this->hasRole(UserRoles::ROLE_TEACHER);
    }

    public function isParent():bool {
        return $this->hasRole(UserRoles::ROLE_PARENT);
    }

    public function isAdmin():bool {
        return $this->hasRole(UserRoles::ROLE_ADMIN);
    }
}
