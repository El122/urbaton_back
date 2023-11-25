<?php

namespace App\Actions\News;

use App\Models\News;

class DeleteNewsAction {
    public function handle(News $news): void {
        $news->delete();
    }
}