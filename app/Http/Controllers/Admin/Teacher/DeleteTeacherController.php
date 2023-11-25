<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Actions\Teacher\DeleteTeacherAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class DeleteTeacherController extends Controller {
    public function delete(User $teacher, DeleteTeacherAction $action): JsonResponse{
        $action->handle($teacher);
        return response()->json([
            'status' => 200,
            'message' => 'Teacher deleted successfully',
        ]);
    }
}
