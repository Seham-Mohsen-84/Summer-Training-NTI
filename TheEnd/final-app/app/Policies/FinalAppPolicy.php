<?php

namespace App\Policies;

use App\Models\User;
use App\Models\final_app;
use Illuminate\Auth\Access\Response;

class FinalAppPolicy
{
    protected $policies = [
        final_app::class => FinalAppPolicy::class,
    ];
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, final_app $finalApp): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, final_app $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, final_app $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, final_app $finalApp): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, final_app $finalApp): bool
    {
        return false;
    }
}
