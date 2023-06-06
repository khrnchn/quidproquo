<?php

use App\Filament\Resources\QuestionResource;
use App\Filament\Resources\QuizResource;
use App\Filament\Resources\Shield\RoleResource;
use App\Filament\Resources\TopicResource;
use App\Filament\Resources\UserResource;
use Stephenjude\FilamentBlog\Resources\PostResource;

return [
    'includes' => [
        TopicResource::class,
        RoleResource::class,
        UserResource::class,
        QuestionResource::class,
        QuizResource::class,
        PostResource::class,
    ],
    'excludes' => [
        // App\Filament\Resources\Blog\AuthorResource::class,
    ],
];
