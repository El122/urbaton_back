<?php

namespace App\Http\Controllers\Admin\Parent;

use App\Http\Controllers\Controller;
use App\Models\ParentStudent;
use Illuminate\Http\JsonResponse;
use App\Actions\Parent\ParentStudentAction;
use App\Http\Requests\ParentStudentRequest;

class ParentStudentController extends Controller
{
    public function __construct()
    {
    }

    public function add(ParentStudentRequest $request, ParentStudentAction $action): JsonResponse
    {
        $data = $action->handle($request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'ParentStudent created successfully',
            'data' => $data,
        ]);
    }

    public function delete(ParentStudent $parentStudent): JsonResponse
    {
        return response()->json([
            'status' => 200,
            'message' => 'ParentStudent successfully deleted',
            'data' => $parentStudent,
        ]);
    }
}
