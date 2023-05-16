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
use Illuminate\Support\Facades\Route;

class AttemptQuiz extends Page
{
    protected static string $resource = QuizResource::class;

    protected static string $view = 'filament.resources.quiz-resource.pages.attempt-quiz';

    public $answered;
    public $question;
    public $question_option_id;
    public $optionIsCorrect;
    public $optionExplanation;
    public $quizQuestions;
    public $questionId;
    public $quizQuestion;
    public $quizAttemptId;
    public $quizId;

    public function mount($record, $quizQuestion)
    {
        $this->answered();

        // get id from QuizAttempt
        $quizAttemptId = QuizAttempt::where([
            'quiz_id' => $record,
            'participant_id' => Auth::id(),
        ])->value('id');

        // check if question already answered
        $option = QuizAttemptAnswer::where([
            'quiz_question_id' => $quizQuestion,
            'quiz_attempt_id' => $quizAttemptId,
        ])->value('question_option_id');

        $questionId = QuizQuestion::where('id', $quizQuestion)->value('question_id');
        $this->questionId = $questionId;

        $question = Question::where('id', $questionId)->value('name');

        $quizId = Route::current()->parameter('record');

        $this->question = $question;
        $this->quizQuestion = $quizQuestion;
        $this->quizAttemptId = $quizAttemptId;
        $this->quizId = $quizId;

        if (is_null($option)) {
            // column is empty
            $question = Question::where('id', $questionId)->value('name');

            $this->question = $question;
        } else {
            // column is not empty/ already has answer

            // retrieve option from $this->form
            $this->form->fill([
                'question_option_id' => $option,
            ]);

            $this->explanation();
        }
    }

    public function submitAnswer()
    {
        // disable the form
        $this->form->disabled();

        // save answer in QuizAttemptAnswer
        QuizAttemptAnswer::where([
            // check quiz_attempt_id as well
            'quiz_attempt_id' => $this->quizAttemptId,
            'quiz_question_id' => $this->quizQuestion,
        ])->update(['question_option_id' => $this->form->getState()['question_option_id']]);

        // show the explanation
        $this->explanation();
    }

    public function explanation()
    {
        $this->form->disabled();
        // show result and explanation
        $optionDetails = QuestionOption::where('id', $this->form->getState())->pluck('explanation', 'is_correct');

        $optionIsCorrect = $optionDetails->keys()->first();
        $optionExplanation = $optionDetails->first();

        $this->optionIsCorrect = $optionIsCorrect;
        $this->optionExplanation = $optionExplanation;
    }

    // navigate to the prev question
    public function previous()
    {
        // current quizAttemptAnswer
        $currentAttemptAnswer = QuizAttemptAnswer::where([
            'quiz_question_id' => $this->quizQuestion,
            'quiz_attempt_id' => $this->quizAttemptId,
        ])->value('created_at');

        // previous quizAttemptAnswer
        $prevAttemptAnswer = QuizAttemptAnswer::where([
            'quiz_attempt_id' => $this->quizAttemptId,
        ])->where('created_at', '<', $currentAttemptAnswer,)->first(); // if there are multiple questions answered before, first() will which one?

        $prevQuizQuestion = $prevAttemptAnswer->quiz_question_id;

        return redirect(QuizResource::getURL('attempt', [$this->quizId, $prevQuizQuestion]));
    }

    // continue to the next question
    public function continue()
    {
        // current quizAttemptAnswer
        $currentAttemptAnswer = QuizAttemptAnswer::where([
            'quiz_question_id' => $this->quizQuestion,
            'quiz_attempt_id' => $this->quizAttemptId,
        ])->value('created_at');

        // next quizAttemptAnswer
        $nextAttemptAnswer = QuizAttemptAnswer::where([
            'quiz_attempt_id' => $this->quizAttemptId,
        ])->where('created_at', '>', $currentAttemptAnswer,)->first();

        $nextQuizQuestion = $nextAttemptAnswer->quiz_question_id;

        return redirect(QuizResource::getURL('attempt', [$this->quizId, $nextQuizQuestion]));
    }

    protected function getFormSchema(): array
    {
        return [
            Radio::make('question_option_id')
                ->label('')
                ->options(
                    QuestionOption::where('question_id', $this->questionId)
                        ->pluck('name', 'id')
                ),
        ];
    }

    public function answered()
    {
        // count total answered questions for the system
        $answered = QuizAttemptAnswer::all()->count();

        $this->answered = $answered;
    }

    protected function fillForm()
    {
        $this->form->fill([
            'question_option_id' => 19,
        ]);
    }
}
