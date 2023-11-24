<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UpdateParentController extends Controller {
    public function update(User $user, ParentRequest $request, UpdateParentAction $action): JsonResponse{
        $data = $action->handle($user, $request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Parent updated successfully',
            'data' => $data,
        ]);
    }
}