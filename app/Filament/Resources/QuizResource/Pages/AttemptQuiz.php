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

    public $answered;
    public $question;
    public $quizAttemptId;
    public $question_option_id;
    public $optionIsCorrect;
    public $optionExplanation;
    public $quizQuestions;
    public $formDisabled;
    public $questionId;

    public function mount($record, $quizQuestion)
    {
        // record = 22, quizQuestion = 56
        $this->formDisabled = false;

        // display QuizQuestion where id = $quizQuestion = 56
        $questionId = QuizQuestion::where('id', $quizQuestion)->value('question_id');
        $this->questionId = $questionId;

        $question = Question::where('id', $questionId)->value('name');

        // get current QuizAttempt details
        $attemptId = QuizAttempt::where([
            'quiz_id' => $record,
            'participant_id' => Auth::id(),
        ])->value('id');

        // count total answered questions for the system
        $answered = QuizAttemptAnswer::all()->count();

        $this->answered = $answered;
        $this->question = $question;
    }

    public function submitAnswer()
    {
        // disable the form
        $this->form->disabled();

        

        // update answer of the previously created QuizAttemptAnswer
        // $quizQuestionsArray = $this->quizQuestions->toArray();

        // $nextQuestionValue = array_slice($quizQuestionsArray, 1, 1, true); // $nextQuestionValue = 19, question_id of QuizQuestions

        // $newQuizQuestionId = array_key_first($nextQuestionValue); // $nextQuestionId = 56, id of QuizQuestions

        //  Get the first value of the resulting array (next question ID)
        // $questionIdFromQuizQuestion = reset($nextQuestionValue); // $questionIdFromQuizQuestion = 19;

        // create new QuizAttemptAnswer
        // QuizAttemptAnswer::create([
        //     'quiz_question_id' => $newQuizQuestionId,
        //     'quiz_attempt_id' => $this->quizAttemptId,
        //     'current_question_id' => $questionIdFromQuizQuestion,
        // ]);

        // update previous QuizAttemptAnswer
        // QuizAttemptAnswer::where([
        //     'quiz_attempt_id' => $this->quizAttemptId, // 55
        // ])->updateOrCreate([
        //     'current_question_id' => $questionIdFromQuizQuestion, // new current_question_id @ 19
        // ]);

        // show the explanation
        $this->explanation();
    }

    public function explanation()
    {
        // show result and explanation
        $optionDetails = QuestionOption::where('id', $this->form->getState())->pluck('explanation', 'is_correct');

        $optionIsCorrect = $optionDetails->keys()->first();
        $optionExplanation = $optionDetails->first();

        $this->optionIsCorrect = $optionIsCorrect;
        $this->optionExplanation = $optionExplanation;
    }

    public function clear()
    {
        $this->form->fill();
    }

    public function previous()
    {
        // get previous question from current question

        // redirect the link with the question id
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
}
