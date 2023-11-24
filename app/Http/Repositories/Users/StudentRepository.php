<?php

namespace App\Http\Repositories\Users;

use App\Enums\UserRoles;
use App\Models\User;

class StudentRepository
{
    public function getAll()
    {
        return User::role(UserRoles::ROLE_STUDENT->value)->get();
    }
}
