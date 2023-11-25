<?php

namespace App\Actions\News;

use App\Entities\News\NewsEntity;
use App\Models\News;

class CreateNewsAction
{
    public function handle(NewsEntity $newsEntity): News
    {
        $news = News::create([
            ...$newsEntity->getModel(),
        ]);
        return $news;
    }
}
