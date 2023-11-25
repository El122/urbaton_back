<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Actions\News\DeleteNewsAction;
use Illuminate\Http\JsonResponse;
use App\Models\News;

class DeleteNewsController extends Controller
{
    public function delete(News $news, DeleteNewsAction $action): JsonResponse
    {
        $action->handle($news);
        return response()->json([
            'status' => 200,
            'message' => 'News deleted successfully',
        ]);
    }
}
