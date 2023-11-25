<?php

namespace App\Http\Controllers\Group;

use App\Actions\Group\UpdateGroupAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Group\GroupRequest;
use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateGroupController extends Controller {
    public function update(Group $group, GroupRequest $request, UpdateGroupAction $action): JsonResponse {
        $action->handle($group, $request->getEntity());
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Group successfully updated',
        ]);
    }
}
