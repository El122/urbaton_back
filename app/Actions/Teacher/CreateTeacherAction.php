<?php

namespace App\Actions\Teacher;

use App\Entities\User\TeacherEntity;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Enums\UserRoles;

class CreateTeacherAction {
    public function handle(TeacherEntity $teacherEntity): User {
        return DB::transaction(function() use ($teacherEntity) {
            $user = User::create([
                ...$teacherEntity->getModel(),
                'password' => Hash::make($teacherEntity->password),
            ]);
            
            Teacher::create([
                'experience' => $teacherEntity->experience,
                'role' => $teacherEntity->role,
                'user_id' => $user->id,
            ]);

            $user->syncRoles(UserRoles::ROLE_TEACHER->value);
            return $user;
        });
    }
}
