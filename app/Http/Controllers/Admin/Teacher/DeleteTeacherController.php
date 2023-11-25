<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Actions\Teacher\DeleteTeacherAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class DeleteTeacherController extends Controller {
    public function update(User $user, DeleteTeacherAction $action): JsonResponse{
        $action->handle($user);
        return response()->json([
            'status' => 200,
            'message' => 'Teacher deleted successfully',
        ]);
    }
}
