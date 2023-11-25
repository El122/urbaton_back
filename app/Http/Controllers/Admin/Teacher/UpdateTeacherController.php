<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Actions\Teacher\UpdateTeacherAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UpdateTeacherController extends Controller {
    public function update(User $user, ParentRequest $request, UpdateTeacherAction $action): JsonResponse{
        $action->handle($user, $request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Teacher updated successfully',
        ]);
    }
}
