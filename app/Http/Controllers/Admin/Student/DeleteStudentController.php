<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Actions\Student\DeleteStudentAction;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class DeleteStudentController extends Controller {
    public function update(User $user, DeleteStudentAction $action): JsonResponse{
        $action->handle($user);
        return response()->json([
            'status' => 200,
            'message' => 'Student deleted successfully',
        ]);
    }
}