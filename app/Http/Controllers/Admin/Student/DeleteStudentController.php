<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Actions\Student\DeleteStudentAction;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class DeleteStudentController extends Controller {
    public function delete(User $student, DeleteStudentAction $action): JsonResponse{
        $action->handle($student);
        return response()->json([
            'status' => 200,
            'message' => 'Student deleted successfully',
        ]);
    }
}