<?php

namespace App\Actions\Teacher;

use App\Entities\Subject\TeacherSubjectEntity;
use App\Models\TeacherSubject;

class UpdateTeacherSubjectAction {
    public function handle(TeacherSubject $teacherSubject, TeacherSubjectEntity $entity): void {
        $teacherSubject->update([
            'plan' => $entity->plan,
        ]);
    }
}
