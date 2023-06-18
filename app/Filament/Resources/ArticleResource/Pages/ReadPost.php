<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Models\Article;
use Filament\Resources\Pages\Page;

class ReadPost extends Page
{
    protected static string $resource = ArticleResource::class;

    protected static string $view = 'filament.resources.article-resource.pages.read-post';

    public $article;

    public function mount($record)
    {
        $article = Article::where('id', $record)->first();
        $this->article = $article;
    }
}
