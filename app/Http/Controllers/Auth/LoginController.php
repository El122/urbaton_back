<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Users\UserRepository;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller {
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {
    }

    public function login(LoginRequest $request, LoginAction $action): JsonResponse {
        $user = $this->userRepository->getByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'Wrong login or password',
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Success login',
            'data' => [
                'token' => $user->createToken($request->email)->plainTextToken,
                'user' => $user,
            ]
        ]);
    }

    public function logout(): JsonResponse {
        auth()->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Success logout',
        ]);
    }
}
