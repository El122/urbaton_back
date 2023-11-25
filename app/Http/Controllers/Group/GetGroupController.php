<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Group\GroupRepository;
use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetGroupController extends Controller {
    public function __construct(
        private readonly GroupRepository $repository,
    ) {}

    public function all(): JsonResponse {
        $groups = $this->repository->getAll();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Groups successfully get',
            'data' => $groups,
        ]);
    }

    public function byId(Group $group): JsonResponse {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Group successfully get',
            'data' => $group,
        ]);
    }
}
