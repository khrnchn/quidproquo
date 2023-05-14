<?php

namespace App\Filament\Resources\QuizResource\Pages;

use App\Filament\Resources\QuizResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Harishdurga\LaravelQuiz\Models\Quiz;

class CreateQuiz extends CreateRecord
{
    protected static string $resource = QuizResource::class;
}
