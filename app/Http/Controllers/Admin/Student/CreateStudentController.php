<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Actions\Student\CreateStudentAction;
use Illuminate\Http\JsonResponse;

class CreateStudentController extends Controller {
    public function create(StudentRequest $request, CreateStudentAction $action): JsonResponse{
        $data = $action->handle($request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Student created successfully',
            'data' => $data,
        ]);
    }
}