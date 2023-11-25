<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Actions\Teacher\UpdateTeacherAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UpdateTeacherController extends Controller {
    public function update(User $teacher, TeacherRequest $request, UpdateTeacherAction $action): JsonResponse{
        $action->handle($teacher, $request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Teacher updated successfully',
        ]);
    }
}
