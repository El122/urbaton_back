<?php

namespace App\Http\Repositories\Users;

use App\Enums\UserRoles;
use App\Models\User;

class ParentRepository
{
    public function getAll()
    {
        return User::role(UserRoles::ROLE_PARENT->value)->get();
    }
}
