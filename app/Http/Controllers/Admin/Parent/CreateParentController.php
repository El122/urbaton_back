<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentRequest;
use App\Actions\Parent\CreateParentAction;
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