<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Subject\SubjectRepository;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetSubjectController extends Controller {
    public function __construct(
        private SubjectRepository $repository,
    ) {}

    public function all(): JsonResponse {
        $subjects = $this->repository->getAll();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Subjects successfully get',
            'data' => $subjects,
        ]);
    }

    public function byId(Subject $subject): JsonResponse {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Subject successfully get',
            'data' => $subject,
        ]);
    }
}
