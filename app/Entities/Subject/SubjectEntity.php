<?php

namespace App\Entities\Subject;

class SubjectEntity {
    public function __construct(
        private string $name,
    ) {}

    public function getModel(): array {
        return [
            'name' => $this->name,
        ];
    }
}
