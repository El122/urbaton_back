<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Actions\News\CreateNewsAction;
use App\Http\Requests\News\NewsRequest;
use Illuminate\Http\JsonResponse;

class CreateNewsController extends Controller {
    public function create(NewsRequest $request, CreateNewsAction $action): JsonResponse{
        $data = $action->handle($request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'News created successfully',
            'data' => $data,
        ]);
    }
}
