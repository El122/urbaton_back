<?php

namespace App\Actions\Teacher;

use App\Entities\User\TeacherEntity;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRoles;

class CreateTeacherAction {
    public function handle(TeacherEntity $teacherEntity): User {
        $user = User::create([
            ...$teacherEntity->getModel(),
            'password' => Hash::make($teacherEntity->password),
        ]);
        $user->syncRoles(UserRoles::ROLE_TEACHER->value);
        return $user;
    }
}
