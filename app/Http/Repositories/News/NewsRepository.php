<?php

namespace App\Http\Repositories\News;

use App\Models\News;

class NewsRepository
{
    public function getAll()
    {
        return News::all();
    }
}
