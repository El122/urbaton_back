<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Actions\Teacher\CreateTeacherAction;
use Illuminate\Http\JsonResponse;

class CreateTeacherController extends Controller {
    public function create(TeacherRequest $request, CreateTeacherAction $action): JsonResponse{
        $data = $action->handle($request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Teacher created successfully',
            'data' => $data,
        ]);
    }
}