<?php

namespace App\Http\Controllers\Admin\Parent;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Users\StudentRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class GetStudentController extends Controller
{
    public function __construct(private StudentRepository $repository)
    {
    }

    public function all(): JsonResponse
    {
        $parents = $this->repository->getAll();
        return response()->json([
            'status' => 200,
            'message' => 'Students successfully get',
            'data' => $parents,
        ]);
    }

    public function byId(User $student): JsonResponse
    {
        return response()->json([
            'status' => 200,
            'message' => 'Student successfully get',
            'data' => $student,
        ]);
    }
}
