<?php

namespace App\Actions\Subject;

use App\Entities\Subject\SubjectEntity;
use App\Models\Subject;

class UpdateSubjectAction {
    public function handle(Subject $subject, SubjectEntity $entity): void {
        $subject->update($entity->getModel());
    }
}
