<?php

namespace App\Policies;

use App\Models\User;
use Harishdurga\LaravelQuiz\Models\Quiz;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user hasPermissionTo view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view_any_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('view_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('update_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('delete_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete_any_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('force_delete_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->hasPermissionTo('force_delete_any_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo restore.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('restore_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->hasPermissionTo('restore_any_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Quiz  $quiz
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Quiz $quiz)
    {
        return $user->hasPermissionTo('replicate_quiz');
    }

    /**
     * Determine whether the user hasPermissionTo reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->hasPermissionTo('reorder_quiz');
    }

}
