<?php

namespace App\Actions\Parent;

use App\Models\User;
use App\Entities\User\ParentEntity;
use Illuminate\Support\Facades\Hash;

class CreateParentAction
{
    public function handle(ParentEntity $parentEntity): User
    {
        $user = User::create([
            ...$parentEntity->getModel(),
            'password' => Hash::make($parentEntity->password),
        ]);
        $user->syncRoles(UserRoles::ROLE_PARENT->value);
        return $user;
    }
}
