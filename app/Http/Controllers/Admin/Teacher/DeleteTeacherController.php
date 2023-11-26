<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Actions\Teacher\DeleteTeacherAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class DeleteTeacherController extends Controller {
    public function delete(User $teacher, DeleteTeacherAction $action): JsonResponse {
        if($teacher->groups())
            return response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'Teacher cannot be deleted',
            ], Response::HTTP_BAD_REQUEST);

        $action->handle($teacher);
        return response()->json([
            'status' => 200,
            'message' => 'Teacher deleted successfully',
        ]);
    }
}
