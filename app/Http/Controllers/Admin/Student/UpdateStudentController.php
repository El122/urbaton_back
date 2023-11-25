<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Actions\Student\UpdateStudentAction;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UpdateStudentController extends Controller {
    public function update(User $student, StudentRequest $request, UpdateStudentAction $action): JsonResponse{
        $data = $action->handle($student, $request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Student updated successfully',
            'data' => $data,
        ]);
    }
}