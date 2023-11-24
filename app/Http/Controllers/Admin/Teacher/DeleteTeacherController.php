<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class DeleteParentController extends Controller {
    public function update(User $user, DeleteParentAction $action): JsonResponse{
        $action->handle($user);
        return response()->json([
            'status' => 200,
            'message' => 'Parent deleted successfully',
        ]);
    }
}