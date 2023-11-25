<?php

namespace App\Actions\News;

use App\Entities\News\NewsEntity;
use App\Models\News;

class CreateNewsAction {
    public function handle(NewsEntity $newsEntity): News {
        $news = News::create([
            ...$newsEntity->getModel(),
        ]);
        if($newsEntity->photo)
            $news->addMedia($newsEntity->photo)->toMediaCollection('preview_picture');
        return $news;
    }
}
