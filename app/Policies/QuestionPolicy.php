<?php

namespace App\Policies;

use App\Models\User;
use Harishdurga\LaravelQuiz\Models\Question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view_any_question');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Question $question)
    {
        return $user->hasPermissionTo('view_question');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create_question');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Question $question)
    {
        return $user->hasPermissionTo('update_question');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Question $question)
    {
        return $user->hasPermissionTo('delete_question');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete_any_question');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Question $question)
    {
        return $user->hasPermissionTo('force_delete_question');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->hasPermissionTo('force_delete_any_question');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Question $question)
    {
        return $user->hasPermissionTo('restore_question');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->hasPermissionTo('restore_any_question');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \Harishdurga\LaravelQuiz\Models\Question  $question
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Question $question)
    {
        return $user->hasPermissionTo('replicate_question');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->hasPermissionTo('reorder_question');
    }

}
