<?php

namespace App\Filament\Resources\QuizResource\Pages;

use App\Filament\Resources\QuizResource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\Page;
use Harishdurga\LaravelQuiz\Models\Question;
use Harishdurga\LaravelQuiz\Models\QuestionOption;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Harishdurga\LaravelQuiz\Models\QuizAttempt;
use Harishdurga\LaravelQuiz\Models\QuizAttemptAnswer;
use Harishdurga\LaravelQuiz\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AttemptQuiz extends Page
{
    protected static string $resource = QuizResource::class;

    protected static string $view = 'filament.resources.quiz-resource.pages.attempt-quiz';

    public $question;
    public $answered;

    public function mount($record)
    {
        // get quiz questions from QuizQuestion model, $record = 22
        // quizQuestions is array, key = id; value = question_id
        $quizQuestions = QuizQuestion::where('quiz_id', $record)->pluck('question_id', 'id');

        // get first question details
        $quizQuestionId = $quizQuestions->keys()->first();
        $questionId = $quizQuestions->first();

        // $question is array btw, $question[0]->name will display the name
        $question = Question::where('id', $questionId)->first();

        // get current QuizAttempt details
        $attemptId = QuizAttempt::where([
            'quiz_id' => $record,
            'participant_id' => Auth::id(),
        ])->value('id');

        // save into QuizAttemptAnswer so that even when user log out, the system knows their last question
        QuizAttemptAnswer::updateOrCreate([
            'quiz_attempt_id' => $attemptId,
            'quiz_question_id' => $quizQuestionId,
            'current_question_id' => $questionId,
        ]);

        // count total answered questions for the system
        $answered = QuizAttemptAnswer::all()->count();

        $this->answered = $answered;
        $this->question = $question;
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
                ->options(
                    QuestionOption::where('question_id', $this->question->id)
                        ->pluck('name', 'id')
                ),
        ];
    }
}
