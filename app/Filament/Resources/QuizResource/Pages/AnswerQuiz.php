<?php

namespace App\Filament\Resources\QuizResource\Pages;

use App\Filament\Resources\QuizResource;
use Filament\Resources\Pages\Page;
use Harishdurga\LaravelQuiz\Models\Quiz;

class AnswerQuiz extends Page
{
    protected static string $resource = QuizResource::class;

    protected static string $view = 'filament.resources.quiz-resource.pages.answer-quiz';

    public $currentUrl;
    public Quiz $quiz;
    public $timeLeft = 1800;
    public $formattedTime;

    public function updateTimer()
    {
        $this->timeLeft--;
        if ($this->timeLeft < 0) {
            $this->formattedTime = "Time's up!";
            $this->emit('timerExpired');
        } else {
            $minutes = floor($this->timeLeft / 60);
            $seconds = $this->timeLeft % 60;
            $this->formattedTime = $minutes . ":" . str_pad($seconds, 2, '0', STR_PAD_LEFT);
            $this->emit('timerUpdated', $this->timeLeft);
        }
    }

    public function mount($record)
    {
        $quiz = Quiz::with(['topics.questions'])->find($record);

        $this->quiz = $quiz;
    }

    public function submit()
    {
        // Handle form submission
    }

    public function previous()
    {
        // Handle "Previous" button click
    }

    public function next()
    {
        // Handle "Next" button click
    }
}
