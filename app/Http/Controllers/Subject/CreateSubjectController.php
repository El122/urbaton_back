<?php

namespace App\Http\Controllers\Subject;

use App\Actions\Subject\CreateSubjectAction;
use App\Http\Requests\Subject\SubjectRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateSubjectController {
    public function create(SubjectRequest $request, CreateSubjectAction $action): JsonResponse {
        $data = $action->handle($request->getEntity());
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Subject successfully created',
            'data' => $data,
        ]);
    }
}
