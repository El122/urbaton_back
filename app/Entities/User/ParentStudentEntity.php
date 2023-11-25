<?php

namespace App\Entities\User;

class ParentStudentEntity
{
    public string $parent_id;
    public string $student_id;

    public function __construct($parent_id, $student_id)
    {
        $this->parent_id = $parent_id;
        $this->student_id = $student_id;
    }

    public function getModel()
    {
        return [
            'parent_id' => $this->parent_id,
            'student_id' => $this->student_id,
        ];
    }
}
