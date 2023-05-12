<?php

namespace App\Filament\Resources\QuizResource\Pages;

use App\Filament\Resources\QuizResource;
use Filament\Resources\Pages\Page;
use Harishdurga\LaravelQuiz\Models\QuestionOption;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Illuminate\Support\Facades\Redirect;

class AnswerQuiz extends Page
{
    protected static string $resource = QuizResource::class;

    protected static string $view = 'filament.resources.quiz-resource.pages.answer-quiz';

    public $currentUrl;
    public Quiz $quiz;
    public $timeLeft = 1800;
    public $formattedTime;
    public $selectedAnswers;
    public $progress;
    public $currentQuestionIndex = 0; // Keep track of the current question index

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
        $quiz = Quiz::with(['topics.questions.options'])->find($record);
        $this->selectedAnswers = collect([]);
        $this->quiz = $quiz;
    }

    public function getProgress()
    {
        $answeredQuestions = 0;
        $questionCount = count($this->quiz->topics->flatMap->questions);

        foreach ($this->quiz->topics as $topic) {
            foreach ($topic->questions as $question) {
                if ($this->selectedAnswers->has($question->id)) {
                    $answeredQuestions++;
                }
            }
        }

        return $answeredQuestions / $questionCount * 100;
    }

    public function submit()
    {
        $url = QuizResource::getURL('result', $this->quiz->id);
        return Redirect::to($url);
    }
}
