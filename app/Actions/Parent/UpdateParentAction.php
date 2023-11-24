<?php

namespace App\Actions\Parent;

use App\Models\User;
use App\Entities\User\ParentEntity;
use Illuminate\Support\Facades\Hash;

class UpdateParentAction {
    public function handle(User $user, ParentEntity $parentEntity): User {
        if ($parentEntity->password) {
            $user->update([
                ...$parentEntity->getModel(),
                'password' => Hash::make($parentEntity->password),
            ]);
        } else {
            $user->update($parentEntity->getModel());
        }
        $user->refresh();
        return $user;
    }
}