<?php

namespace App\Actions\News;

use App\Models\News;
use App\Entities\News\NewsEntity;
use Illuminate\Support\Facades\Hash;

class UpdateNewsAction {
    public function handle(News $news, NewsEntity $newsEntity): void {
        $news->update([
            ...$newsEntity->getModel(),
        ]);
    }
}
