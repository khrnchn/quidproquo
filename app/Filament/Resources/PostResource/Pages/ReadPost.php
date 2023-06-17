<?php

namespace Stephenjude\FilamentBlog\Resources\PostResource\Pages;

use App\Models\Article;
use Filament\Resources\Pages\Page;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Resources\PostResource;

class ReadPost extends Page
{
    protected static string $resource = PostResource::class;

    protected static string $view = 'filament.resources.post-resource.pages.read-post';

    public $post;

    public function mount($record)
    {
        $post = Article::where('id', $record)->first();
        $this->post = $post;

    }
}
