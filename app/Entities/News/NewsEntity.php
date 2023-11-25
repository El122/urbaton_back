<?php

namespace App\Entities\News;

class NewsEntity
{
    public string $title;
    public string $text;
    public string $type;

    public function __construct($title, $text, $type)
    {
        $this->title = $title;
        $this->text = $text;
        $this->type = $type;
    }

    public function getModel()
    {
        return [
            'title' => $this->title,
            'text' => $this->text,
            'type' => $this->type,
        ];
    }
}
