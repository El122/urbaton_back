<?php

namespace App\Actions\Parent;

use App\Models\User;

class DeleteParentAction {
    public function handle(User $user): void {
        $user->delete();
    }
}