<?php

namespace App\Actions\Student;

use App\Models\User;
use App\Models\Student;
use App\Entities\User\StudentEntity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateStudentAction {
    public function handle(StudentEntity $studentEntity): User {
        return DB::transaction(function() use($studentEntity) {    
            $user = User::create([
                ...$studentEntity->getModel(),
                'password' => Hash::make($studentEntity->password),
            ]);
            Student::create(
                'group_id' => $studentEntity->group,
                'user_id' => $user->id,
            );
            $user->syncRoles(UserRoles::ROLE_STUDENT->value);
            return $user;
        });
    }
}