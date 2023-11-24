<?php

namespace App\Actions\Student;

use App\Models\User;

class DeleteStudentAction {
    public function handle(User $user): void {
        $user->delete();
    }
}