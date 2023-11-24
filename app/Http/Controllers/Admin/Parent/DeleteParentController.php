<?php

namespace App\Http\Controllers\Admin\Parent;

use App\Http\Controllers\Controller;
use App\Actions\Parent\DeleteParentAction;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class DeleteParentController extends Controller
{
    public function delete(User $parent, DeleteParentAction $action): JsonResponse
    {
        $action->handle($parent);
        return response()->json([
            'status' => 200,
            'message' => 'Parent deleted successfully',
        ]);
    }
}
