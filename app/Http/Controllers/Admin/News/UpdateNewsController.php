<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsRequest;
use App\Actions\News\UpdateNewsAction;
use Illuminate\Http\JsonResponse;
use App\Models\News;

class UpdateNewsController extends Controller {
    public function update(News $news, NewsRequest $request, UpdateNewsAction $action): JsonResponse{
        $action->handle($news, $request->getEntity());
        return response()->json([
            'status' => 200,
            'message' => 'News updated successfully',
        ]);
    }
}
