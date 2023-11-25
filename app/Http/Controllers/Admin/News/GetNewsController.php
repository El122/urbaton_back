<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Repositories\News\NewsRepository;
use App\Models\News;
use Illuminate\Http\JsonResponse;

class GetNewsController extends Controller {
    public function __construct(private NewsRepository $repository) {}

    public function all(): JsonResponse {
        $news = $this->repository->getAll();
        return response()->json([
            'status' => 200,
            'message' => 'News successfully get',
            'data' => $news,
        ]);
    }

    public function byId(News $news): JsonResponse {
        return response()->json([
            'status' => 200,
            'message' => 'News successfully get',
            'data' => $news->withPhoto(),
        ]);
    }
}
