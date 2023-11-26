<?php

namespace App\Actions\Parent;

use App\Entities\User\ParentEntity;
use App\Models\ParentStudent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRoles;

class CreateParentAction {
    public function handle(ParentEntity $parentEntity): User {
        $user = User::create([
            ...$parentEntity->getModel(),
            'password' => Hash::make($parentEntity->password),
        ]);
        $user->syncRoles(UserRoles::ROLE_PARENT->value);

        if($parentEntity->children)
            ParentStudent::create([
                'parent_id' => $user->id,
                'student_id' => $parentEntity->children,
            ]);

        return $user;
    }
}
