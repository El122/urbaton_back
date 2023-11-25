<?php

namespace App\Http\Controllers\Group;

use App\Actions\Group\DeleteGroupAction;
use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteGroupController extends Controller {
    public function delete(Group $group, DeleteGroupAction $action): JsonResponse {
        $action->handle($group);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Group successfully deleted',
        ]);
    }
}
