<?php

namespace App\Http\Controllers\Admin\Parent;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use App\Actions\Parent\UpdateParentAction;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UpdateParentController extends Controller {
    public function update(User $parent, ParentRequest $request, UpdateParentAction $action): JsonResponse{
        $action->handle($parent, $request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Parent updated successfully',
        ]);
    }
}
