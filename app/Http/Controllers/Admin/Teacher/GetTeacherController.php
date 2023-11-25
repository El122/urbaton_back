<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Users\TeacherRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetTeacherController extends Controller {
    public function __construct(private readonly TeacherRepository $repository) {}

    public function all(): JsonResponse {
        $teachers = $this->repository->getAll();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Teachers successfully get',
            'data' => $teachers,
        ]);
    }

    public function byId(User $teacher): JsonResponse {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Teacher successfully get',
            'data' => $teacher,
        ]);
    }
}
