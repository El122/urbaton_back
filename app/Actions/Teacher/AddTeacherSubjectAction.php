<?php

namespace App\Actions\Teacher;

use App\Entities\Subject\TeacherSubjectEntity;
use App\Helpers\DateHelper;
use App\Models\TeacherSubject;
use App\Models\User;

class AddTeacherSubjectAction {
    public function handle(User $teacher, TeacherSubjectEntity $entity): TeacherSubject {
        return TeacherSubject::create([
            ...$entity->getModel(),
            'user_id' => $teacher->id,
            'year' => DateHelper::currentStudyYear(),
        ]);
    }
}
