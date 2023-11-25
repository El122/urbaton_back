<?php

namespace App\Entities\Group;

class GroupEntity {
    public function __construct(
        private string $name,
        private int    $teacher,
    ) {}

    public function getModel(): array {
        return [
            'name' => $this->name,
            'user_id' => $this->teacher,
        ];
    }
}
