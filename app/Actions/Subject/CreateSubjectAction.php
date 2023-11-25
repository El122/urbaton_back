<?php

namespace App\Actions\Subject;

use App\Entities\Subject\SubjectEntity;
use App\Models\Subject;

class CreateSubjectAction {
    public function handle(SubjectEntity $entity): Subject {
        return Subject::create($entity->getModel());
    }
}
