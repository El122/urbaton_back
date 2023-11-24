<?php

namespace App\Actions\Student;

use App\Models\User;
use App\Entities\User\StudentEntity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UpdateStudentAction {
    public function handle(User $user, StudentEntity $studentEntity): User {
        return DB::transaction(function() use($studentEntity) {
            if ($studentEntity->password) {
                $user->update([
                    ...$studentEntity->getModel(),
                    'password' => Hash::make($studentEntity->password),
                ]);
            } else {
                $user->update($studentEntity->getModel());
            }
            $user->student->update(['group_id' => $studentEntity->group]);
            $user->refresh();
            return $user;
        });
    }
}