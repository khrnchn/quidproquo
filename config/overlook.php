<?php

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\NewsResource;
use App\Filament\Resources\QuestionResource;
use App\Filament\Resources\QuizResource;
use App\Filament\Resources\Shield\RoleResource;
use App\Filament\Resources\TopicResource;
use App\Filament\Resources\UserResource;

return [
    'includes' => [
        TopicResource::class,
        RoleResource::class,
        UserResource::class,
        QuestionResource::class,
        QuizResource::class,
        ArticleResource::class,
    ],
    'excludes' => [
        RoleResource::class,
    ],
];
