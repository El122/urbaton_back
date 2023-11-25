<?php

namespace App\Actions\Teacher;

use App\Models\TeacherSubject;

class DeleteTeacherSubjectAction {
    public function handle(TeacherSubject $teacherSubject): void {
        $teacherSubject->delete();
    }
}
