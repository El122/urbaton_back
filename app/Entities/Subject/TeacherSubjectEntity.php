<?php

namespace App\Entities\Subject;

class TeacherSubjectEntity {
    public function __construct(
        public ?int $subject,
        public ?int $group,
        public int $plan,
    ) {}

    public function getModel(): array {
        return [
            'subject_id' => $this->subject,
            'group_id' => $this->group,
            'plan' => $this->plan,
        ];
    }
}
