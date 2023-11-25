<?php

namespace App\Entities\News;

use Illuminate\Http\UploadedFile;

class NewsEntity {

    public function __construct(
        public string $title,
        public string $text,
        public string $type,
        public ?UploadedFile $photo,
    ) {
    }

    public function getModel() {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'type' => $this->type,
        ];
    }
}
