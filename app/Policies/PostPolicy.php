<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Allow any user to view any post
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return true; // Allow any user to view a specific post
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Profile $profile): bool
    {
        dd($profile !==null);
        return $profile !==null;
    }

    /**
     * Determine whether the user can edit the model.
     */
    public function edit(Profile $profile, Post $post): bool
    {
        return $profile->id === $post->profile_id; // Allow editing only if the user owns the post
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Profile $profile, Post $post): bool
    {
        return $profile->id === $post->profile_id; // Allow updating only if the user owns the post
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Profile $profile, Post $post): bool
    {
        return $profile->id === $post->profile_id; // Allow deleting only if the user owns the post
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return false; // Not allowing restoring for simplicity, modify as needed
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false; // Not allowing permanent deletion for simplicity, modify as needed
    }
}
