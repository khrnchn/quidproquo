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
    public $attemptAnswerId;
    public $answer;
    public $optionIsCorrect;
    public $optionExplanation;
    public $quizQuestions;

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
        $attemptAnswer = QuizAttemptAnswer::updateOrCreate([
            'quiz_attempt_id' => $attemptId,
            'quiz_question_id' => $quizQuestionId,
            'current_question_id' => $questionId,
        ]);

        // count total answered questions for the system
        $answered = QuizAttemptAnswer::all()->count();

        $this->answered = $answered;
        $this->question = $question;
        $this->attemptAnswerId = $attemptAnswer->id;
        $this->quizQuestions = $quizQuestions;
    }

    public function answer()
    {
        // update answer of the previously created QuizAttemptAnswer
        // WIP WIP WIP move current_question_id to next question

        // Get all values except for the first one (current question ID)
        $quizQuestionsArray = $this->quizQuestions->toArray();
        $nextQuestionValue = array_slice($quizQuestionsArray, 1, 1);

        // Get the first value of the resulting array (next question ID)
        $nextQuestionId = reset($nextQuestionValue); // $nextQuestionValue and  $nextQuestionId = 19;

        // to be continued

        $questionAttemptAnswer = new QuizAttemptAnswer([
            'quiz_question_id' => 'to_be_continued',
            'quiz_attempt_id' => $this->quizAttempt->id,
            'current_question_id' => $nextQuestionId,
        ]);

        $questionAttemptAnswer->save();

        QuizAttemptAnswer::updateOrCreate(
            [
                'id' => $this->attemptAnswerId,
                'current_question_id' => 19, // this is hardcoded btw
            ], // specify the primary key column and value to update an existing row
            $this->form->getState() // use the form state to update the other columns
        );

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
