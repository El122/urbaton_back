<?php

namespace App\Http\Repositories\Users;

use App\Models\User;

class UserRepository {
    public function getByEmail(string $email) {
        return User::where(['email' => $email])->first();
    }
}
