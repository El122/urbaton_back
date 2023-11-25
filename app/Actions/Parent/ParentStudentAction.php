<?php

namespace App\Actions\Parent;

use App\Entities\User\ParentStudentEntity;
use App\Models\ParentStudent;

class ParentStudentAction
{
    public function handle(ParentStudentEntity $parentStudentEntity): ParentStudent
    {
        $user = ParentStudent::create([
            ...$parentStudentEntity->getModel(),
        ]);
        return $user;
    }
}
