<?php

namespace App\Http\Controllers\Admin\Parent;

use App\Http\Controllers\Controller;
use App\Actions\Parent\CreateParentAction;
use App\Http\Requests\ParentRequest;
use Illuminate\Http\JsonResponse;

class CreateParentController extends Controller {
    public function create(ParentRequest $request, CreateParentAction $action): JsonResponse{
        $data = $action->handle($request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'Parent created successfully',
            'data' => $data,
        ]);
    }
}
