<?php

namespace App\Http\Controllers\Group;

use App\Actions\Group\CreateGroupAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Group\GroupRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateGroupController extends Controller {
    public function create(GroupRequest $request, CreateGroupAction $action): JsonResponse{
        $group = $action->handle($request->getEntity());
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Group successfully created',
            'data' => $group,
        ]);
    }
}
