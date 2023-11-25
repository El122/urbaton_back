<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia {
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'text',
        'type',
    ];

    public function registerMediaCollections(): void {
        $this->addMediaCollection("preview_picture")->singleFile();
    }

    public function getPhoto(): ?string  {
        return $this->getMedia('preview_picture')->first()?->getUrl();
    }

    public function withPhoto(): News {
        $this->photo = $this->getPhoto();
        return $this->withoutRelations();
    }
}
