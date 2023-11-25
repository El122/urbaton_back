<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginAction {
    public function handle(LoginRequest $request): bool {
        $authenticate = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember);

        if ($authenticate)
            $request->session()->regenerate();

        return $authenticate;
    }
}
