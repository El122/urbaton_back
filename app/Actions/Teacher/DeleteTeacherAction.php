<?php

namespace App\Actions\Teacher;

use App\Models\User;

class DeleteTeacherAction {
    public function handle(User $user): void {
        $user->delete();
    }
}
