<?php

namespace App\Http\Repositories\News;

use App\Models\News;

class NewsRepository {
    public function getAll() {
        return News::all()->map(function($item) {
            $item->photo = $item->getPhoto();
            return $item->withoutRelations();
        });
    }
}
