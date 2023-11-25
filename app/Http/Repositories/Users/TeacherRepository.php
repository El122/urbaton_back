<?php

namespace App\Http\Repositories\Users;

use App\Enums\UserRoles;
use App\Models\User;

class TeacherRepository {
    public function getAll() {
        return User::role(UserRoles::ROLE_TEACHER->value)->get();
    }
}
