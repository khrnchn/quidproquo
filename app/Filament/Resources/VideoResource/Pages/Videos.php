<?php

namespace App\Filament\Resources\VideoResource\Pages;

use App\Filament\Resources\VideoResource;
use App\Models\Video;
use Filament\Resources\Pages\Page;

class Videos extends Page
{
    protected static string $resource = VideoResource::class;

    protected static string $view = 'filament.resources.video-resource.pages.videos';

    public $videos;

    public function mount()
    {
        $videos = Video::get();
        $this->videos = $videos;
    }
}
