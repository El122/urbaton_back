<?php

namespace App\Http\Controllers\Subject;

use App\Actions\Subject\UpdateSubjectAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subject\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateSubjectController extends Controller {
    public function update(Subject $subject, SubjectRequest $request, UpdateSubjectAction $action): JsonResponse {
        $action->handle($subject, $request->getEntity());
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Subject successfully updated',
        ]);
    }
}
