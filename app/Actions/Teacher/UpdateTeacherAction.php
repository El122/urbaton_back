<?php

namespace App\Actions\Teacher;

use App\Entities\User\TeacherEntity;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateTeacherAction {
    public function handle(User $user, TeacherEntity $teacherEntity): void {
        if ($teacherEntity->password) {
            $user->update([
                ...$teacherEntity->getModel(),
                'password' => Hash::make($teacherEntity->password),
            ]);
        } else {
            $user->update($teacherEntity->getModel());
        }
        dd($user->teacher);
        $user->teacher()->update([
            'role' => $teacherEntity->role,
            'experience' => $teacherEntity->experience,
        ]);
        $user->refresh();
    }
}
