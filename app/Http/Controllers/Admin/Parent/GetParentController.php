<?php

namespace App\Http\Controllers\Admin\Parent;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Users\ParentRepository;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class GetParentController extends Controller
{
    public function __construct(private ParentRepository $repository)
    {
    }

    public function all(): JsonResponse
    {
        $parents = $this->repository->getAll();
        return response()->json([
            'status' => 200,
            'message' => 'Parents successfully get',
            'data' => $parents,
        ]);
    }

    public function byId(User $parent): JsonResponse
    {
        return response()->json([
            'status' => 200,
            'message' => 'Parent successfully get',
            'data' => $parent,
        ]);
    }
}
