<?php

namespace App\Filament\Resources\QuizResource\Pages;

use App\Filament\Resources\QuizResource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\Page;
use Harishdurga\LaravelQuiz\Models\QuestionOption;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;
use Illuminate\Database\Eloquent\Model;

class AttemptQuiz extends Page
{
    protected static string $resource = QuizResource::class;

    protected static string $view = 'filament.resources.quiz-resource.pages.attempt-quiz';

    public Quiz $quiz;

    public function mount($record): void
    {
        // $record = current quiz id = 1
        $quiz = Quiz::with(['topics.questions.options'])->find($record);
        dd($record);

        // get quiz questions from QuizQuestion model
    }

    public function answer()
    {
        $answer = QuizAttemptAnswer::create($this->form->getState());
    }

    protected function getFormSchema(): array
    {
        return [
            Radio::make('answer')
                ->label('')
                ->options(QuestionOption::all()->pluck('name', 'id')),
        ];
    }
}
